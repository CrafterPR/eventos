<?php
 use App\Models\User;
extract($data);
use Illuminate\Support\Arr;
?>
<x-default-layout>
    @section('title')
        Dashboard
    @endsection
    @if(auth()->check() && !auth()->user()->hasRole('delegate'))
        @can('view-dashboard')
            <!-- Summary cards: Revenue, Expected, Tickets Purchased, Paid Orders (per currency) -->
            <div class="row g-5 g-xl-10 mx-5 mp-n4 mb-xl-10">
                <div class="col-12">
                    <?php

                        // Revenue per currency (paid)
                        $revenueByCurrency = \App\Models\PurchaseOrder::where('status', \App\Enum\PurchaseOrderStatus::PAID->value)
                            ->select('currency', \DB::raw('SUM(amount) as total'))
                            ->groupBy('currency')
                            ->get()
                            ->mapWithKeys(function($item){
                                $k = isset($item->currency) && ($item->currency instanceof \App\Enum\Currency) ? $item->currency->value : (string)($item->currency ?? '');
                                return [$k => $item->total];
                            })
                            ->toArray();

                        // Expected per currency (all orders)
                        $expectedByCurrency = \App\Models\PurchaseOrder::select('currency', \DB::raw('SUM(amount) as total'))
                            ->groupBy('currency')
                            ->get()
                            ->mapWithKeys(function($item){
                                $k = isset($item->currency) && ($item->currency instanceof \App\Enum\Currency) ? $item->currency->value : (string)($item->currency ?? '');
                                return [$k => $item->total];
                            })
                            ->toArray();

                        // Paid orders count per currency
                        $paidOrdersByCurrency = \App\Models\PurchaseOrder::where('status', \App\Enum\PurchaseOrderStatus::PAID->value)
                            ->select('currency', \DB::raw('COUNT(*) as total'))
                            ->groupBy('currency')
                            ->get()
                            ->mapWithKeys(function($item){
                                $k = isset($item->currency) && ($item->currency instanceof \App\Enum\Currency) ? $item->currency->value : (string)($item->currency ?? '');
                                return [$k => $item->total];
                            })
                            ->toArray();

                        // Tickets purchased per currency
                        $ticketsByCurrency = [];
                        $pos = \App\Models\PurchaseOrder::select('tickets', 'currency')->get();
                        foreach ($pos as $po) {
                            $currency = ($po->currency instanceof \App\Enum\Currency) ? $po->currency->value : ($po->currency ?: 'KES');

                            $tickets = $po->tickets;
                            if (is_string($tickets)) {
                                $decoded = json_decode($tickets, true);
                                if (json_last_error() === JSON_ERROR_NONE) {
                                    $tickets = $decoded;
                                }
                            }

                            if (!is_array($tickets) && !$tickets instanceof \Illuminate\Support\Collection) {
                                continue;
                            }

                            foreach ($tickets as $t) {
                                if (is_array($t)) {
                                    $qty = isset($t['count']) ? (int)$t['count'] : (isset($t['quantity']) ? (int)$t['quantity'] : 1);
                                    $key = $currency;
                                    $ticketsByCurrency[$key] = ($ticketsByCurrency[$key] ?? 0) + $qty;
                                }
                            }
                        }

                        // Build list of all currencies present across metrics (ensure keys are strings)
                        $allKeys = [];
                        foreach ([$revenueByCurrency, $expectedByCurrency, $paidOrdersByCurrency, $ticketsByCurrency] as $arr) {
                            foreach (array_keys($arr) as $k) {
                                $allKeys[] = is_object($k) ? (string)$k : (string)$k;
                            }
                        }
                        $currencies = array_values(array_unique($allKeys));
                        sort($currencies);
                   ?>

                    <div class="row g-3">
                        @foreach($currencies as $currency)
                            <div class="col-md-3">
                                <div class="card card-flush h-md-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-4">
                                                <span class="symbol-label bg-primary">
                                                    <i class="ki-duotone ki-wallet fs-2 text-white"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-7">{{ $currency }} — Revenue collected</div>
                                                <div class="fw-bold fs-4">{{ $currency }} {{ number_format
                                                ($revenueByCurrency[$currency] ?? 0, 2) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-flush h-md-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-4">
                                                <span class="symbol-label bg-info">
                                                    <i class="ki-duotone ki-chart fs-2 text-white"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-7">{{ $currency }} — Expected collections</div>
                                                <div class="fw-bold fs-4">{{ $currency }} {{ number_format($expectedByCurrency[$currency] ?? 0, 2) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-flush h-md-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-4">
                                                <span class="symbol-label bg-success">
                                                    <i class="ki-duotone ki-ticket fs-2 text-white"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-7">{{ $currency }} — Tickets purchased</div>
                                                <div class="fw-bold fs-4">{{ number_format
                                                ($ticketsByCurrency[$currency] ?? 0) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-flush h-md-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-4">
                                                <span class="symbol-label bg-warning">
                                                    <i class="ki-duotone ki-check fs-2 text-white"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-7">{{ $currency }} — Paid orders</div>
                                                <div class="fw-bold fs-4">{{ $paidOrdersByCurrency[$currency]
                                                ?? 0 }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

                <livewire:events.create-event-modal />
                <livewire:events.checkin-modal />
                <livewire:delegate.import-delegates-modal></livewire:delegate.import-delegates-modal>
        @endcan
        @can('view-dashboard')
            <div class="row g-5 g-xl-10 mx-5 mp-n4 mb-xl-10">
                <div class="d-flex align-items-center">
                    <h3 class="card-title align-items-start flex-column"></h3>
                    <div class="card-toolbar ms-auto"> <!-- Use 'ms-auto' to push it to the right -->
                        <a href="#" class="btn btn-sm btn-light">
                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-setting-3 fs-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </button>
                            Filter by event</a>
                        <!--begin::Task menu-->
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" data-kt-menu-id="kt-users-tasks">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bold">Update Status</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Menu separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Menu separator-->
                            <!--begin::Form-->
                            <form class="form px-7 py-5" data-kt-menu-id="kt-users-tasks-form">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-6 fw-semibold">Status:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" name="task_status" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-hide-search="true">
                                        <option></option>
                                        <option value="1">Approved</option>
                                        <option value="2">Pending</option>
                                        <option value="3">In Process</option>
                                        <option value="4">Rejected</option>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-users-update-task-status="reset">Reset</button>
                                    <button type="submit" class="btn btn-sm btn-primary" data-kt-users-update-task-status="submit">
                                        <span class="indicator-label">Apply</span>
                                        <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>

                <div class="col-md-8 card card-flush h-md-100">
                    <div class="card-header pt-7 d-flex">
                        <h3 class="card-title align-items-start flex-column justify-content-center">
                            <span class="card-label fw-bold text-gray-800">Ticket purchases by category</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-sm btn-light">View All</a>
                        </div>
                    </div>
                    <livewire:events.ticket-purchases-by-category />
                </div>
                <div class="col-md-4 card card-flush h-md-100">
                    <div class="card-header pt-7 d-flex">
                        <h3 class="card-title align-items-start flex-column justify-content-center">
                            <span class="card-label fw-bold text-gray-800">Total delegates by category</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="{{ route('events.delegates.index') }}" class="btn btn-sm btn-light">View All</a>
                        </div>
                    </div>
                    <livewire:events.purchase-orders-doughnut />
                </div>
            </div>
      @endcan
    @endif
    @if(auth()->check() && auth()->user()->hasRole('delegate'))
        <div class="row g-5 g-xl-10 mx-5 mp-n4 mb-xl-10">
            <div class="col-md-12">
                <div class="card card-flush h-md-100">
                    <div class="card-header pt-7 d-flex align-items-center">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Your Tickets</span>
                            <span class="text-muted small">Tickets you previously selected / purchased</span>
                        </h3>
                        <div class="card-toolbar ms-auto">
                            <a href="{{ route('tickets.index') }}" class="btn btn-sm btn-primary">Purchase more</a>
                        </div>
                    </div>
                    <div class="card-body pt-6">
                        @if(isset($data['myPurchaseOrders']) && $data['myPurchaseOrders']->count())
                            <div class="table-responsive">
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <thead>
                                    <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                        <th class="p-0 pb-3 min-w-150px text-start">REFERENCE</th>
                                        <th class="p-0 pb-3 min-w-150px text-start">DATE</th>
                                        <th class="p-0 pb-3 min-w-150px text-start">AMOUNT</th>
                                        <th class="p-0 pb-3 min-w-150px text-start">STATUS</th>
                                        <th class="p-0 pb-3 min-w-350px text-start">TICKETS</th>
                                        <th class="p-0 pb-3 min-w-100px text-start">ACTIONS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($data['myPurchaseOrders'] as $po)
                                        <tr @if($po->status === \App\Enum\PurchaseOrderStatus::NEW->value) class="table-warning" @endif>
                                            <td class="text-start pe-0">
                                                <span class="text-gray-800 fw-bold fs-6">{{ $po->reference }}</span>
                                            </td>
                                            <td class="text-start pe-0">
                                                <span class="text-gray-800 fw-bold fs-6">
                                                    {{ format_date($po->created_at, 'Y, dS M') }}
                                                </span>
                                            </td>
                                            <td class="text-start pe-0">
                                                <span class="text-gray-600 fw-bold fs-6">{{ format_amount($po->amount) }}</span>
                                            </td>
                                            <td class="text-start pe-0">
                                                @if($po->status === \App\Enum\PurchaseOrderStatus::NEW->value)
                                                    <span class="badge badge-warning">
                                                        {{ Str::upper('Pending') }}
                                                    </span>
                                                @elseif($po->status === \App\Enum\PurchaseOrderStatus::PAID->value)
                                                    <span class="badge badge-success">
                                                        {{ Str::upper($po->status->value) }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-danger">
                                                        {{ Str::upper($po->status->value) }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-start pe-0">
                                                @if(is_array($po->tickets) || $po->tickets instanceof \Illuminate\Support\Collection)
                                                    <ul class="mb-0">
                                                        @foreach($po->tickets as $t)
                                                            <li class="text-gray-600">@if(is_array($t) && isset($t['type'])){{ $t['type'] }} x {{ $t['count'] ?? $t['quantity'] ?? 1 }}@else{{ json_encode($t) }}@endif</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <span class="text-gray-600">{{ json_encode($po->tickets) }}</span>
                                                @endif
                                            </td>
                                            <td class="text-start pe-0">
                                                <?php
                                                    $payLink = \App\Models\Pesaflow\PesaflowRequest::where('purchase_order_id', $po->id)->latest()->value('invoice_link') ?: route('tickets.show', $po->id);
                                                ?>
                                                @if($po->status === \App\Enum\PurchaseOrderStatus::NEW->value)
                                                    @if(Str::startsWith($payLink, ['http://', 'https://']))
                                                        <a href="{{ $payLink }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-danger">Pay Now</a>
                                                    @else
                                                        <a href="{{ $payLink }}" class="btn btn-sm btn-danger">Pay Now</a>
                                                    @endif
                                                @else
                                                    <a href="{{ route('tickets.show', $po->id) }}" class="btn btn-sm btn-light">View</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">No purchase orders found.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center text-muted">No tickets found. <a href="{{ route('tickets.index') }}">Purchase tickets</a></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif


@push('scripts')
            <!-- Styles -->
            <style>
                #chartdiv {
                    width: 100%;
                    height: 500px;
                }
                #pieChartDiv {
                    width: 100%;
                    height: 500px;
                }
            </style>

            <!-- Resources -->
            <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
@endpush
</x-default-layout>
