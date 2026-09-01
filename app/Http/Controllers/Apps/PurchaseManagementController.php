<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use App\Models\Delegate;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Pesaflow\PesaflowRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PurchaseExport;

class PurchaseManagementController extends Controller
{
    public function index(Request $request)
    {
        // Filters from querystring
        $paymentMethod = $request->query('payment_method');
        $statusFilter = $request->query('status');
        $ticketType = $request->query('ticket_type');
        $dateFrom = $request->query('date_from');
        $dateTo = $request->query('date_to');

        // Build unified query for all purchase orders
        $query = PurchaseOrder::with('user');

        if ($paymentMethod && $paymentMethod !== 'all') {
            $query->where('payment_method', $paymentMethod);
        }

        if ($statusFilter && $statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }

        // Ticket type filter (category id in JSON tickets)
        if ($ticketType) {
            $query->where(function($q) use ($ticketType) {
                $q->whereJsonContains('tickets->*.category_id', (int) $ticketType)
                  ->orWhereJsonContains('tickets->*.category_id', (string) $ticketType);
            });
        }

        // Date range filter for purchase order dates
        if ($dateFrom) {
            $query->whereDate('created_at', '>=', $dateFrom);
        }
        if ($dateTo) {
            $query->whereDate('created_at', '<=', $dateTo);
        }

        // Paginate single combined list
        $orders = $query->latest()->paginate(50);

        // For backward compatibility with view, use single list
        $pendingOrders = $orders;
        $paidOrders = collect([]);

        return view('pages.purchases.index', compact('pendingOrders', 'paidOrders'));
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->load('user');

        // Determine if delegates already exist for this purchase's tickets
        $tickets = is_array($purchaseOrder->tickets) ? $purchaseOrder->tickets : (json_decode($purchaseOrder->tickets, true) ?: []);
        $emails = [];
        foreach ($tickets as $t) {
            if (is_array($t) && !empty($t['email'])) {
                $emails[] = $t['email'];
            }
        }
        // include purchaser email as fallback
        if ($purchaseOrder->payment_email) {
            $emails[] = $purchaseOrder->payment_email;
        }

        $emails = array_filter(array_unique($emails));
        $delegatesCount = 0;
        if (!empty($emails)) {
            $delegatesCount = Delegate::whereIn('email', $emails)->count();
        }

        return view('pages.purchases.show', ['order' => $purchaseOrder, 'delegatesCount' => $delegatesCount, 'ticketsCount' => count($tickets)]);
    }

    public function export(Request $request)
    {
        $paymentMethod = $request->query('payment_method');
        $statusFilter = $request->query('status');
        $ticketType = $request->query('ticket_type');
        $dateFrom = $request->query('date_from');
        $dateTo = $request->query('date_to');

        $query = PurchaseOrder::with('user');

        if ($paymentMethod && $paymentMethod !== 'all') {
            $query->where('payment_method', $paymentMethod);
        }

        if ($statusFilter && $statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }

        // Ticket type filter (category id in JSON tickets)
        if ($ticketType) {
            $query->where(function($q) use ($ticketType) {
                $q->whereJsonContains('tickets->*.category_id', (int) $ticketType)
                  ->orWhereJsonContains('tickets->*.category_id', (string) $ticketType);
            });
        }

        // Date range filter for purchase order dates
        if ($dateFrom) {
            $query->whereDate('created_at', '>=', $dateFrom);
        }
        if ($dateTo) {
            $query->whereDate('created_at', '<=', $dateTo);
        }

        $orders = $query->latest()->get();

        // Export to Excel using PurchaseExport; pass ids of filtered orders
        $ids = $orders->pluck('id')->toArray();
        $filename = 'purchase-orders-' . now()->format('Ymd-His') . '.xlsx';

        return Excel::download(new PurchaseExport($ids), $filename);
    }

    public function resendReminder(Request $request, PurchaseOrder $purchaseOrder)
    {
        // Find the latest pesaflow invoice link
        $invoiceLink = \App\Models\Pesaflow\PesaflowRequest::where('purchase_order_id', $purchaseOrder->id)
            ->latest()
            ->value('invoice_link');

        $recipientEmail = $purchaseOrder->payment_email ?? $purchaseOrder->user?->email;
        $recipientName = $purchaseOrder->user ? trim(($purchaseOrder->user->first_name ?? '') . ' ' . ($purchaseOrder->user->last_name ?? '')) : null;

        if (!$recipientEmail) {
            return back()->with('error', 'No recipient email available for this purchase order.');
        }

        if (!$invoiceLink) {
            return back()->with('error', 'No invoice link found for this purchase order.');
        }

        try {
            // Queue the reminder to avoid blocking the request
            Mail::to($recipientEmail)->queue(new \App\Mail\PaymentReminderMail($recipientName, $invoiceLink, $purchaseOrder->reference));
            return back()->with('success', 'Payment reminder queued for sending to ' . $recipientEmail);
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to queue reminder: ' . $e->getMessage());
        }
    }

    public function uploadReceipt(Request $request, PurchaseOrder $purchaseOrder)
    {
        $request->validate([
            'receipt' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $path = $request->file('receipt')->store('purchase_receipts', 'public');
        $purchaseOrder->payment_receipt = $path;
        $purchaseOrder->save();

        return back()->with('success', 'Payment receipt uploaded. You may now approve the purchase.');
    }

    public function approve(Request $request, PurchaseOrder $purchaseOrder)
    {
        // Only allow approval when receipt is present
        if (!$purchaseOrder->payment_receipt) {
            return back()->with('error', 'No payment receipt uploaded for this order.');
        }

        return $this->processApproval($purchaseOrder);
    }

    public function generateDelegates(Request $request, PurchaseOrder $purchaseOrder)
    {
        // Only operate on paid orders
        if ($purchaseOrder->status !== 'paid') {
            return back()->with('error', 'Can only generate delegates for paid purchases.');
        }

        // Reuse delegate creation logic but don't change purchase status
        $tickets = is_array($purchaseOrder->tickets)
            ? $purchaseOrder->tickets
            : (json_decode($purchaseOrder->tickets, true) ?: []);

        $created = 0;
        DB::beginTransaction();
        try {
            foreach ($tickets as $ticket) {
                $firstName = $ticket['first_name'] ?? $purchaseOrder->user?->first_name ?? null;
                $lastName = $ticket['last_name'] ?? $purchaseOrder->user?->last_name ?? null;
                $email = $ticket['email'] ?? $purchaseOrder->user?->email ?? null;
                $mobile = $ticket['mobile'] ?? $purchaseOrder->payment_phone ?? $purchaseOrder->user?->mobile ?? null;
                $eventId = $ticket['event_id'] ?? optional(Event::first())->id;
                $categoryId = $ticket['category_id'] ?? optional(Category::first())->id;

                if ($firstName && $lastName && $email && $eventId) {
                    $exists = Delegate::where('email', $email)->where('event_id', $eventId)->exists();
                    if (!$exists) {
                        Delegate::create([
                            'salutation' => $ticket['salutation'] ?? null,
                            'first_name' => $firstName,
                            'last_name' => $lastName,
                            'email' => $email,
                            'mobile' => $mobile,
                            'id_number' => $ticket['id_number'] ?? null,
                            'gender' => $ticket['gender'] ?? null,
                            'event_id' => $eventId,
                            'organization' => $ticket['organization'] ?? $purchaseOrder->user?->organization ?? null,
                            'position' => $ticket['position'] ?? null,
                            'category_id' => $categoryId,
                            'country_id' => $ticket['country_id'] ?? null,
                            'county_id' => $ticket['county_id'] ?? null,
                        ]);
                        $created++;
                    }
                }
            }

            DB::commit();
            return back()->with('success', "Created {$created} delegates where possible.");
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to generate delegates: ' . $e->getMessage());
        }
    }

    /**
     * Mark purchase as paid and create delegates (used by admin when marking paid manually)
     */
    public function markAsPaid(Request $request, PurchaseOrder $purchaseOrder)
    {
        // This bypasses receipt upload and marks the order as paid by admin
        return $this->processApproval($purchaseOrder);
    }

    /**
     * Shared approval processing
     */
    protected function processApproval(PurchaseOrder $purchaseOrder)
    {
        DB::beginTransaction();
        try {
            $purchaseOrder->status = 'paid';
            $purchaseOrder->approved_by = auth()->id();
            $purchaseOrder->approved_at = now();
            $purchaseOrder->save();

            // Generate delegates or exhibitors from tickets
            $tickets = is_array($purchaseOrder->tickets)
                ? $purchaseOrder->tickets
                : (json_decode($purchaseOrder->tickets, true) ?: []);

            foreach ($tickets as $ticket) {
                // ticket may be associative array; fallback to purchaser data
                $firstName = $ticket['first_name'] ?? $purchaseOrder->user?->first_name ?? null;
                $lastName = $ticket['last_name'] ?? $purchaseOrder->user?->last_name ?? null;
                $email = $ticket['email'] ?? $purchaseOrder->user?->email ?? null;
                $mobile = $ticket['mobile'] ?? $purchaseOrder->payment_phone ?? $purchaseOrder->user?->mobile ?? null;

                // find event/category if provided, otherwise pick first available
                $eventId = $ticket['event_id'] ?? optional(Event::first())->id;
                $categoryId = $ticket['category_id'] ?? optional(Category::first())->id;

                // Create a delegate record when we can
                if ($firstName && $lastName && $email && $eventId) {
                    // Only create if delegate with same email doesn't already exist for the event
                    $exists = Delegate::where('email', $email)->where('event_id', $eventId)->exists();
                    if (!$exists) {
                        Delegate::create([
                            'salutation' => $ticket['salutation'] ?? null,
                            'first_name' => $firstName,
                            'last_name' => $lastName,
                            'email' => $email,
                            'mobile' => $mobile,
                            'id_number' => $ticket['id_number'] ?? null,
                            'gender' => $ticket['gender'] ?? null,
                            'event_id' => $eventId,
                            'organization' => $ticket['organization'] ?? $purchaseOrder->user?->organization ?? null,
                            'position' => $ticket['position'] ?? null,
                            'category_id' => $categoryId,
                            'country_id' => $ticket['country_id'] ?? null,
                            'county_id' => $ticket['county_id'] ?? null,
                        ]);
                    }
                }
            }

            DB::commit();
            return back()->with('success', 'Purchase marked as paid and delegates created where possible.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to approve purchase: ' . $e->getMessage());
        }
    }
}
