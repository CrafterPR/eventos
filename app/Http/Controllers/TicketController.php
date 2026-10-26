<?php

namespace App\Http\Controllers;

use App\Actions\CreateDelegatesFromPurchaseOrder;
use App\Enum\PurchaseOrderStatus;
use App\Models\Delegate;
use App\Models\Event;
use Illuminate\View\View;
use App\Models\PurchaseOrder;
use App\DataTables\PurchaseOrdersDataTable;

class TicketController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        return view('pages.tickets.index', ['authUser' => $user]);
    }

    public function orders(PurchaseOrdersDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.event-management.purchased-tickets');
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        $user = auth()->user();
        // Only owner or administrators can view
        if (!method_exists($user, 'hasRole') || (! $user->hasRole('administrator') && $purchaseOrder->user_id !== $user->id)) {
            abort(403);
        }

        $purchaseOrder->load('user');

        return view('pages.tickets.show', ['order' => $purchaseOrder]);
    }

    public function printTicket(
        PurchaseOrder $purchaseOrder,
        int $ticketIndex,
        CreateDelegatesFromPurchaseOrder $delegateCreator
    ): View {
        $user = auth()->user();
        if ($purchaseOrder->user_id !== $user->id) {
            abort(403);
        }
        abort_unless(PurchaseOrderStatus::isPaid($purchaseOrder->status), 404);

        $tickets = $purchaseOrder->tickets ?? [];
        $ticket = array_values($tickets)[$ticketIndex] ?? null;
        abort_unless(is_array($ticket), 404);

        $category = $delegateCreator->categoryForTicket($ticket);
        abort_unless($category, 404);

        $eventId = $ticket['event_id'] ?? Event::query()
            ->orderByDesc('start_date')
            ->orderByDesc('created_at')
            ->value('id');
        abort_unless($eventId, 404);

        $delegateCreator->handle($purchaseOrder);
        $delegate = Delegate::query()
            ->with('event')
            ->where('email', $user->email)
            ->where('event_id', $eventId)
            ->where('category_id', $category->id)
            ->firstOrFail();

        $ticketType = $ticket['type'] ?? $ticket['ticket_type'] ?? $delegate->ticket_type ?? $category->title;

        return view('pages.tickets.print', compact('delegate', 'ticketType'));
    }
}
