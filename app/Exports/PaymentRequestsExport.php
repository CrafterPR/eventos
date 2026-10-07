<?php

namespace App\Exports;

use App\Models\Category;
use App\Models\Pesaflow\PesaflowRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PaymentRequestsExport implements FromQuery, WithHeadings, WithMapping, WithStyles
{
    private Collection $categories;

    public function __construct(private Builder $query)
    {
        $this->categories = Category::query()->pluck('title', 'id');
    }

    public function query(): Builder
    {
        return $this->query;
    }

    public function map($paymentRequest): array
    {
        $purchaseOrder = $paymentRequest->purchase_order;
        $ticketTypes = [];

        foreach ($purchaseOrder?->tickets ?? [] as $ticket) {
            if (!is_array($ticket)) {
                continue;
            }

            if (!empty($ticket['category_id'])) {
                $categoryId = (string) $ticket['category_id'];
                $ticketTypes[] = $this->categories->get($categoryId, 'Category ' . $categoryId);
            } elseif (!empty($ticket['type'])) {
                $ticketTypes[] = $ticket['type'];
            }
        }

        return [
            $paymentRequest->invoice_number,
            $purchaseOrder?->reference,
            implode(', ', array_unique($ticketTypes)),
            $paymentRequest->amount_expected,
            $paymentRequest->status->value === 'settled' ? 'Success' : strtoupper($paymentRequest->status->value),
            $paymentRequest->currency->value,
            $purchaseOrder?->user?->country?->name,
            $paymentRequest->created_at?->format('Y-m-d H:i:s'),
        ];
    }

    public function headings(): array
    {
        return ['Invoice', 'Purchase order', 'Ticket type', 'Amount', 'Status', 'Currency', 'Country', 'Date'];
    }

    public function styles(Worksheet $sheet): array
    {
        return [1 => ['font' => ['bold' => true]]];
    }
}
