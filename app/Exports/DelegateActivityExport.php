<?php

namespace App\Exports;

use App\Models\Delegate;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use OwenIt\Auditing\Models\Audit;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DelegateActivityExport implements FromQuery, WithHeadings, WithMapping, WithStyles
{
    public function __construct(private Builder $query)
    {
    }

    public function query(): Builder
    {
        return $this->query->with(['auditable.country', 'user']);
    }

    public function map($activity): array
    {
        /** @var Audit $activity */
        $delegate = $activity->auditable;

        return [
            $activity->created_at?->format('Y-m-d H:i:s'),
            $delegate instanceof Delegate ? $delegate->name : '',
            $delegate instanceof Delegate ? $delegate->email : '',
            $delegate instanceof Delegate ? $delegate->country?->name : '',
            ucfirst($activity->event),
            $activity->user?->name,
        ];
    }

    public function headings(): array
    {
        return ['Date', 'Delegate', 'Email', 'Country', 'Activity', 'Performed by'];
    }

    public function styles(Worksheet $sheet): array
    {
        return [1 => ['font' => ['bold' => true]]];
    }
}
