<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class DelegateImport implements SkipsEmptyRows, ToCollection, WithBatchInserts, WithChunkReading, WithHeadingRow, WithValidation
{
    public function __construct(private readonly string $eventId) {}

    public function collection(Collection $collection): void
    {
        if (Schema::hasTable('users')) {
            foreach ($collection as $row) {
                User::where('email', $row['email'])->firstOr(function () use ($row) {
                    $password = Str::random(10);
                    User::create([
                        'first_name' => $row['first_name'],
                        'last_name' => $row['last_name'],
                        'institution' => $row['institution'],
                        'email' => $row['email'],
                        'gender' => $row['gender'],
                        'user_type' => $this->getUserType($row['category']),
                        'event_id' => $this->eventId,
                        'country_id' => $this->getCountry($row['country']),
                        'password' => bcrypt($password),
                        'category_id' => $this->getCategory($row['category'])
                    ]);

                });
            }
        }
    }

    public function rules(): array
    {
        return [
            '*.first_name' => ['required'],
            '*.last_name' => ['required'],
            '*.institution' => ['required'],
            '*.email' => ['required', 'email'],
        ];
    }

    public function customValidationMessages(): array
    {
        return [
            'first_name.required' => 'Row :attribute is blank',
            'last_name.required' => 'Row :attribute is blank',
            'institution.required' => 'Row :attribute is blank',
            'email.required' => 'Row :attribute is blank',
            'email.email' => 'Row :attribute must be a valid email address',
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

    private function getCountry(string $country):string|null
    {
        return Country::query()
            ->where('name', 'LIKE', $country)
            ->first()
            ?->id;
    }

    private function getCategory(string $category): string|null
    {
        return Category::query()
            ->where('title', 'LIKE', $category)
            ->first()
           ?->id;
    }

    private function getUserType($category): string|null
    {
        return Str::contains($category, 'Exhibitor') ? 'exhibitor' : 'delegate';
    }
}
