<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\PurchaseOrder;
use Illuminate\Http\Response;

class TicketController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        return view('pages.tickets.index', ['authUser' => $user]);
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
