<?php

namespace App\Exports;

use App\Models\Delegate;
use Maatwebsite\Excel\Concerns\FromCollection;

class DelegateExport implements FromCollection
{

    public function __construct(public $delegates) {}

    public function collection()
    {
        return Delegate::whereIn('id', $this->delegates)->get();
    }
}
