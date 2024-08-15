<?php

namespace App\Actions;

use App\Enum\VoterStatus;
use App\Models\Voter;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class VoterImport implements SkipsEmptyRows, ToCollection, WithBatchInserts, WithChunkReading, WithHeadingRow, WithValidation
{

    /**
     * @param Collection $collection
     * @return void
     */
    public function collection(Collection $collection): void
    {
        //dd($collection);
        if (Schema::hasTable('voters')) {
            foreach ($collection as $row) {
                Voter::where('mobile', $row['mobile'])->firstOr(function () use ($row) {
                    Voter::create([
                        'first_name' => $row['first_name'],
                        'last_name' => $row['last_name'],
                        'mobile' => $row['mobile'],
                        'creator_id' => auth()->id(),
                        'branch' => 'HQ',
                        'email' => $row['email'],
                        'status' => VoterStatus::ACTIVE,
                    ]);

                });
            }
        }
    }

    public function rules(): array
    {
        return [
            '*.first_name' => ['required'],
            '*.last_name' => ['sometimes'],
            '*.mobile' => ['sometimes'],
            '*.email' => ['sometimes'],
        ];
    }

    public function customValidationMessages(): array
    {
        return [
            'first_name.required' => 'Row :attribute is blank',
            'mobile.required' => 'Row :attribute is blank',
        ];
    }

    public function chunkSize(): int
    {
        return 200;
    }

    public function batchSize(): int
    {
        return 200;
    }
}
