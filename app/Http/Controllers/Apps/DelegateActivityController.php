<?php

namespace App\Http\Controllers\Apps;

use App\Exports\DelegateActivityExport;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Delegate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class DelegateActivityController extends Controller
{
    public function index(Request $request)
    {
        $filters = $this->validatedFilters($request);
        $activities = $this->filteredQuery($filters)
            ->with(['auditable.country', 'user'])
            ->latest()
            ->paginate(25)
            ->withQueryString();

        $delegates = Delegate::query()
            ->orderBy('first_name')
            ->orderBy('last_name')
            ->get(['id', 'first_name', 'last_name', 'email']);
        $countries = Country::query()
            ->whereIn('id', Delegate::query()->select('country_id')->whereNotNull('country_id'))
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('pages.reports.delegate-activity', compact('activities', 'delegates', 'countries', 'filters'));
    }

    public function export(Request $request)
    {
        $filters = $this->validatedFilters($request);

        return Excel::download(
            new DelegateActivityExport($this->filteredQuery($filters)),
            'delegate-activity-' . now()->format('Ymd-His') . '.xlsx'
        );
    }

    private function validatedFilters(Request $request): array
    {
        return $request->validate([
            'date_from' => ['nullable', 'date_format:Y-m-d'],
            'date_to' => ['nullable', 'date_format:Y-m-d', 'after_or_equal:date_from'],
            'country' => ['nullable', 'string', Rule::exists('countries', 'id')],
            'delegate' => ['nullable', 'string', Rule::exists('delegates', 'id')],
        ]);
    }

    private function filteredQuery(array $filters): Builder
    {
        $query = \OwenIt\Auditing\Models\Audit::query()
            ->where('auditable_type', Delegate::class);

        if (!empty($filters['date_from'])) {
            $query->whereDate('created_at', '>=', $filters['date_from']);
        }

        if (!empty($filters['date_to'])) {
            $query->whereDate('created_at', '<=', $filters['date_to']);
        }

        if (!empty($filters['delegate'])) {
            $query->where('auditable_id', $filters['delegate']);
        }

        if (!empty($filters['country'])) {
            $query->whereHasMorph('auditable', [Delegate::class], function (Builder $delegateQuery) use ($filters) {
                $delegateQuery->where('country_id', $filters['country']);
            });
        }

        return $query;
    }
}
