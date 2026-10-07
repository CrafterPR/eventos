<x-default-layout>
    @section('title')
        Delegate Activity Logs
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('reports.delegate-activity.index') }}
    @endsection

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div>
                    <h2 class="mb-1">Delegate activity logs</h2>
                    <p class="text-muted mb-0">Activity history for delegate records.</p>
                </div>
            </div>
        </div>

        <div class="card-body py-4">
            <form method="GET" action="{{ route('reports.delegate-activity.index') }}"
                  class="row g-3 align-items-end mb-6">
                <div class="col-12 col-md-3">
                    <label for="activity-date-from" class="form-label">From date</label>
                    <input id="activity-date-from" name="date_from" type="date" class="form-control"
                           value="{{ $filters['date_from'] ?? '' }}">
                </div>
                <div class="col-12 col-md-3">
                    <label for="activity-date-to" class="form-label">To date</label>
                    <input id="activity-date-to" name="date_to" type="date" class="form-control"
                           value="{{ $filters['date_to'] ?? '' }}">
                </div>
                <div class="col-12 col-md-3">
                    <label for="activity-country" class="form-label">Country</label>
                    <select id="activity-country" name="country" class="form-select">
                        <option value="">All countries</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" @selected(($filters['country'] ?? '') === $country->id)>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-3">
                    <label for="activity-delegate" class="form-label">Delegate</label>
                    <select id="activity-delegate" name="delegate" class="form-select"
                            data-control="select2" data-placeholder="All delegates">
                        <option value="">All delegates</option>
                        @foreach($delegates as $delegate)
                            <option value="{{ $delegate->id }}" @selected(($filters['delegate'] ?? '') === $delegate->id)>
                                {{ trim($delegate->first_name . ' ' . $delegate->last_name) }} ({{ $delegate->email }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('reports.delegate-activity.index') }}" class="btn btn-light">Clear</a>
                    <a href="{{ route('reports.delegate-activity.export', request()->only(['date_from', 'date_to', 'country', 'delegate'])) }}"
                       class="btn btn-light-primary">Export to Excel</a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase">
                            <th>Date</th>
                            <th>Delegate</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Activity</th>
                            <th>Performed by</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        @forelse($activities as $activity)
                            @php $delegate = $activity->auditable; @endphp
                            <tr>
                                <td>{{ $activity->created_at?->format('Y-m-d H:i') ?: '—' }}</td>
                                <td>{{ $delegate?->name ?: 'Delegate no longer available' }}</td>
                                <td>{{ $delegate?->email ?: '—' }}</td>
                                <td>{{ $delegate?->country?->name ?: '—' }}</td>
                                <td>{{ ucfirst($activity->event) }}</td>
                                <td>{{ $activity->user?->name ?: 'System' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-8">No delegate activity found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">{{ $activities->links() }}</div>
        </div>
    </div>
</x-default-layout>
