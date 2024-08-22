<?php

namespace App\Http\Controllers;

use App\DataTables\OrdersDataTable;
use App\DataTables\TicketsDataTable;
use App\Enum\OrderItemStatus;
use App\Models\OrderItem;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{


    public function index(TicketsDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.ticket-management.manage-tickets');
    }

    /**
     * Display a listing of the resource.
     */
    public function checkin($ticket_no): View
    {
        $ticket =  OrderItem::query()
        ->where('reference_no', $ticket_no)
        ->where('status', OrderItemStatus::APPROVED->value)
            ->first();
        return view('pages.apps.ticket-management.ticket-checkin', compact('ticket'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function view_purchased(OrdersDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.ticket-management.purchased-tickets');
    }
}
