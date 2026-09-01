<?php

namespace App\Http\Controllers;

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
}
