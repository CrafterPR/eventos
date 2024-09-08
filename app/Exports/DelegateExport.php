<?php

namespace App\Exports;

use App\Models\Delegate;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

class DelegateExport implements FromCollection, WithHeadings, WithStyles
{

    public function __construct(public $delegates) {}

    public function collection(): Collection|array
    {

        return Delegate::query()
            ->whereIn('id', $this->delegates)
            ->with(['category', 'event', 'country'])
            ->get()
            ->map(function ($delegate) {
                return [
                    'name' => $delegate->salutation . ' ' . $delegate->first_name . ' ' . $delegate->last_name,
                    'email' => $delegate->email,
                    'mobile' => $delegate->mobile,
                    'organization' => $delegate->organization,
                    'country' => $delegate->country->name ?? 'N/A', // Access related country name
                    'event' => $delegate->event->title ?? 'N/A', // Access related event title
                    'category' => $delegate->category->title ?? 'N/A', // Access related category title
                    'gender' => $delegate->gender,
                    'PassPrinted' => $delegate->pass_printed ? 'Yes' : 'No'
                ];
            });
    }

    public function headings(): array
    {
        // Return an array of headers for the Excel sheet
        return [
            'Name',
            'Email',
            'Mobile',
            'Organization',
            'Event',
            'Category',
            'Country',
            'Gender',
            'Pass Printed',
        ];
    }

    public function styles(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet)
    {
        return [
            // Bold headers in the first row
            1 => ['font' => ['bold' => true]],
        ];
    }
}
