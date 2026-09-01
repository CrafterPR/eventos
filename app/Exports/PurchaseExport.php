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
    public function __construct() {}

    public function collection(): Collection|array
    {
        return PurchaseOrder::query()
            ->with(['user', 'pesaflow_request'])
            ->get()
            ->flatMap(function ($order) {
                $purchaser = $order->user ? trim(($order->user->first_name ?? '') . ' ' . ($order->user->last_name ?? '')) : '';
                $email = $order->payment_email ?? $order->user?->email ?? '';

                $base = [
                    'reference' => $order->reference,
                    'purchaser' => $purchaser,
                    'email' => $email,
                    'phone' => $order->payment_phone ?? $order->user?->mobile ?? '',
                    'organization' => $order->user?->organization ?? '',
                    'amount' => number_format($order->amount, 2),
                    'currency' => $order->currency ?? '',
                    'payment_method' => strtoupper($order->payment_method ?? ''),
                    'status' => $order->status->label(),
                ];

                $rows = [];

                $tickets = $order->tickets;
                if (is_string($tickets)) {
                    $decoded = json_decode($tickets, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $tickets = $decoded;
                    }
                }

                if (is_array($tickets) || $tickets instanceof Collection) {
                    foreach ($tickets as $t) {
                        if (!is_array($t)) {
                            // fallback: stringify
                            $ticketLabel = is_scalar($t) ? (string)$t : json_encode($t);
                            $qty = 1;
                        } else {
                            $type = $t['type'] ?? ($t['title'] ?? null);
                            $qty = isset($t['count']) ? (int)$t['count'] : (isset($t['quantity']) ? (int)$t['quantity'] : 1);
                            $ticketLabel = ($type ?? 'Ticket') . ' x ' . $qty;
                        }

                        $rows[] = array_merge($base, ['tickets' => $ticketLabel]);
                    }
                } else {
                    // no tickets array: emit one row with empty tickets
                    $rows[] = array_merge($base, ['tickets' => '']);
                }

                return $rows;
            });
    }

    public function headings(): array
    {
        return [
            'Reference', 'Purchaser', 'Email', 'Phone', 'Organization', 'Amount', 'Currency', 'Payment Method', 'Status', 'Tickets'
        ];
    }

    public function styles(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet)
    {
        return [1 => ['font' => ['bold' => true]]];
    }
}
