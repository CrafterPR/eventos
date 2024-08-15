<?php

namespace App\Exports;

use App\Enum\OrderItemStatus;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\UserCoupon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromQuery, WithMapping, WithHeadings, WithStyles, ShouldAutoSize
{
    use Exportable;

    private string $date_from;
    private string $date_to;

    public function __construct(public $input)
    {
        $dates = explode(' - ', $this->input['range']);
        $this->date_from =  $dates[0]. ':00';
        $this->date_to =  $dates[1].':00';
    }

    public function query()
    {
        if ($this->input['type'] == 'coupon') {
            return UserCoupon::query()
                ->select([
                    'users.id',
                    'users.email',
                    'users.salutation',
                    'users.first_name',
                    'users.last_name',
                    'users.institution',
                    'users.position',
                    'users.mobile',
                    'tickets.title',
                    'coupons.days',
                    'tickets.title',
                    'countries.name as country_name',
                    'user_coupons.created_at']) // Select all fields from the users table and the 'name' field from the countries table
                ->distinct()
                ->join('users', 'user_coupons.user_id', 'users.id')
                ->join('coupons', 'coupons.id', 'user_coupons.coupon_id')
                ->join('tickets', 'coupons.type_id', 'tickets.id')
                ->join('countries', 'countries.id', 'users.country_id')
                ->whereBetween('user_coupons.created_at', [$this->date_from, $this->date_to])
                ->orderBy('user_coupons.created_at');
        } else {
            return  OrderItem::query()
                ->select([
                    'users.id',
                    'users.email',
                    'users.salutation',
                    'users.first_name',
                    'users.last_name',
                    'users.institution',
                    'users.position',
                    'users.mobile',
                    'tickets.title',
                    DB::raw('MAX(order_items.created_at) as created_at'),
                    'countries.name as country_name',
                ])
                ->join('users', 'order_items.user_id', 'users.id')
                ->join('tickets', 'order_items.itemable_id', 'tickets.id')
                ->join('countries', 'countries.id', 'users.country_id')
                ->where('order_items.itemable_type', 'ticket')
                ->whereIn('order_items.status', [OrderItemStatus::PAID, OrderItemStatus::APPROVED])
                ->whereBetween('order_items.updated_at', [$this->date_from, $this->date_to])
                ->groupBy(
                    'users.id',
                    'users.email',
                    'users.salutation',
                    'users.first_name',
                    'users.last_name',
                    'users.institution',
                    'users.position',
                    'users.mobile',
                    'tickets.title',
                    'countries.name'
                )
                ->orderBy('users.id');

        }
    }

    /**
    * @param User $user
    */
    public function map($record): array
    {
        if ($this->input['type'] == 'ticket') {
            $days = OrderItem::query()
                ->join('tickets', 'order_items.itemable_id', 'tickets.id')
                ->where('user_id', $record->id)
                ->where('tickets.title', $record->title)
                ->whereIn('order_items.status', [OrderItemStatus::PAID->value, OrderItemStatus::APPROVED->value])
                ->count();
        }
        return [
            $record->salutation,
            $record->first_name,
            $record->last_name,
            $record->institution,
            $record->position,
            $record->email,
            $record->mobile . ' ',
            $record->country_name ?? '' ,
            'delegate',
            "TRUE",
            $this->input['type'] == 'ticket' ? $days : $record->days,
            $record->title
        ];
    }

    public function headings(): array
    {
        return [
            "Salutation",
            "First Name",
            "Last Name",
            "Institution",
            "Position",
            "Email",
            "Mobile",
            "Country",
            "Category",
            "PAID",
            "No of Days Paid For",
            "Ticket Type",
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true, 'size' => 16]],
        ];
    }
}
