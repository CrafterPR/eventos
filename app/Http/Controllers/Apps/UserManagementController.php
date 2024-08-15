<?php

namespace App\Http\Controllers\Apps;

use App\DataTables\UsersDataTable;
use App\Enum\OrderItemStatus;
use App\Enum\UserType;
use App\Enum\VoterStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\SMSRequest;
use App\Models\EmailGroup;
use App\Models\TicketPayment;
use App\Models\User;
use App\Models\Voter;
use App\Notifications\SendEmailsNotification;
use App\Notifications\SendSMSNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.user-management.users.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('pages.apps.user-management.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    protected function getAllRegistered(): \Illuminate\Database\Eloquent\Collection|array
    {
        return User::query()
            ->where('user_type', UserType::DELEGATE)
            ->orWhere('user_type', UserType::EXHIBITOR)
            ->get();
    }
    protected function getAllStaff(): \Illuminate\Database\Eloquent\Collection|array
    {
        return User::query()
            ->where('user_type', '!=', UserType::DELEGATE)
            ->where('user_type', '!=', UserType::EXHIBITOR)
            ->get();
    }

    protected function getAllDelegates(): \Illuminate\Database\Eloquent\Collection|array
    {
        return User::query()
            ->where('user_type', UserType::DELEGATE)
            ->get();
    }
    protected function getAllExhibitors(): \Illuminate\Database\Eloquent\Collection|array
    {
        return User::query()
            ->where('user_type', UserType::EXHIBITOR)
            ->get();
    }
    protected function getPaidDelegates(): Collection
    {
        return DB::table('users')
            ->join('order_items', 'order_items.user_id', 'user.id')
            ->where('user_type', UserType::DELEGATE)
            ->where('order_items.status', OrderItemStatus::PAID)
            ->get();
    }
    protected function getPaidExhibitors(): Collection
    {
        return DB::table('users')
            ->join('order_items', 'order_items.user_id', 'user.id')
            ->where('user_type', UserType::EXHIBITOR)
            ->where('order_items.status', OrderItemStatus::PAID)
            ->get();
    }
    protected function getUnPaidDelegates(): Collection
    {
        return DB::table('users')
            ->join('order_items', 'order_items.user_id', 'user.id')
            ->where('user_type', UserType::DELEGATE)
            ->where('order_items.status', OrderItemStatus::PENDING)
            ->get();
    }
    protected function getUNPaidExhibitors(): Collection
    {
        return DB::table('users')
            ->join('order_items', 'order_items.user_id', 'user.id')
            ->where('user_type', UserType::EXHIBITOR)
            ->where('order_items.status', OrderItemStatus::PENDING)
            ->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
