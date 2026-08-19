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

class PurchaseManagementController extends Controller
{
    public function index()
    {
        $orders = PurchaseOrder::with('user')->latest()->paginate(20);
        return view('pages.purchases.index', compact('orders'));
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->load('user');
        return view('pages.purchases.show', ['order' => $purchaseOrder]);
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

            DB::commit();
            return back()->with('success', 'Purchase approved and delegates created where possible.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to approve purchase: ' . $e->getMessage());
        }
    }
}
