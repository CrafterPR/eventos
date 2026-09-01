<?php

namespace App\Exports;

use App\Models\PurchaseOrder;
use App\Models\Pesaflow\PesaflowRequest;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

class PurchaseExport implements FromCollection, WithHeadings, WithStyles
{
    public function __construct(public $ids) {}

    public function collection(): Collection|array
    {
        return PurchaseOrder::query()
            ->whereIn('id', $this->ids)
            ->with('user', 'pesaflow_request')
            ->get()
            ->map(function ($order) {
                $invoiceLink = PesaflowRequest::where('purchase_order_id', $order->id)->latest()->value('invoice_link');
                $purchaser = $order->user ? trim(($order->user->first_name ?? '') . ' ' . ($order->user->last_name ?? '')) : '';
                $email = $order->payment_email ?? $order->user?->email ?? '';

                return [
                    'reference' => $order->reference,
                    'purchaser' => $purchaser,
                    'email' => $email,
                    'phone' => $order->payment_phone ?? $order->user?->mobile ?? '',
                    'organization' => $order->user?->organization ?? '',
                    'amount' => number_format($order->amount, 2),
                    'currency' => $order->currency ?? '',
                    'payment_method' => strtoupper($order->payment_method ?? ''),
                    'status' => $order->status->label(),
                    'invoice_link' => $invoiceLink ?? '',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Reference', 'Purchaser', 'Email', 'Phone', 'Organization', 'Amount', 'Currency', 'Payment Method', 'Status', 'Invoice Link'
        ];
    }

    public function styles(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet)
    {
        return [1 => ['font' => ['bold' => true]]];
    }
}
