@php use App\Models\User; @endphp
@php(extract($data))

<x-default-layout>
    @section('title')
        Dashboard
    @endsection

   {{-- @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection--}}
    @can('view-dashboard')
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-50 mb-5 mb-xl-10"
                 style="background-color: blue; background-image:url({{ asset('assets/media/patterns/vector-1.png') }})">
                <div class="card-header pt-5">
                    <div class="card-title d-flex flex-column">
                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ 20 }}</span>
                        <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Booked Booths</span>
                    </div>
                </div>
                <div class="card-body d-flex align-items-end pt-0">
                    <div class="d-flex align-items-center flex-column mt-3 w-100">
                        <div
                            class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                            <span>{{$booths["pending"]}} Pending</span>
                            <span>{{$booths["percent"]}}%</span>
                        </div>
                        <div class="h-8px mx-3 w-100 bg-white bg-opacity-50 rounded">
                            <div class="bg-white rounded h-8px" role="progressbar"
                                 style="width: {{$booths["percent"]}}%;"
                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                <div class="card-header pt-5">
                    <div class="card-title d-flex flex-column">
                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{$staff["total"]}}</span>
                        <a href="{{route("users.user.index")}}">
                            <span class="text-gray-400 pt-1 fw-semibold fs-6">Staff</span>
                        </a>
                    </div>
                </div>
                <div class="card-body d-flex flex-column justify-content-end pe-0">
                    <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Recent Signups</span>
                    <div class="symbol-group symbol-hover flex-nowrap">
                        @foreach($staff["list"] as $user)
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                 title="{{$user->name}}">
                                @if ($user->profile_photo_path)
                                    <img alt="{{$user->name}}" src="{{ $user->profile_photo_url }}"/>
                                @else
                                    <span class="symbol-label {{random_bg()}} fw-bold">
                                        {{substr($user->first_name, 0, 1)}}
                                    </span>
                                @endif
                            </div>
                        @endforeach
                        @if($staff["total"] > 6)
                            <a href="{{route("users.index")}}" class="symbol symbol-35px symbol-circle">
                                <span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">
                                    +{{$staff["total"]-6}}
                                </span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-50 mb-5 mb-xl-10"
                 style="background-color: green;background-image:url('{{ asset('assets/media/patterns/vector-1.png') }}')">
                <div class="card-header pt-5">
                    <div class="card-title d-flex flex-column">
                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{  200}}</span>
                        <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Printed Passes</span>
                    </div>
                </div>
                <div class="card-body d-flex align-items-end pt-0">
                    <div class="d-flex align-items-center flex-column mt-3 w-100">
                        <div
                            class="d-block justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                <span class="d-grid">( {{ 40 }} ) Delegates</span>
                                <span class="d-grid">( {{ 45 }} ) Speakers</span>
                                <span class="d-grid">( {{ 15 }} ) Exhibitors</span>
                                <span class="d-grid">( {{ 4 }} ) Moderators</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                <div class="card-header pt-5">
                    <div class="card-title d-flex flex-column">
                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $exhibitor["total"] }}</span>
                        <a href="{{route("users.delegates.index")}}">
                            <span class="text-gray-400 pt-1 fw-semibold fs-6">Exhibitors</span>
                        </a>
                    </div>
                </div>
                <div class="card-body d-flex flex-column justify-content-end pe-0">
                    <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Recent Signups</span>
                    <div class="symbol-group symbol-hover flex-nowrap">
                        @foreach($exhibitor["list"] as $user)
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                 title="{{$user->name}}">
                                @if ($user->profile_photo_path)
                                    <img alt="{{$user->name}}" src="{{ $user->profile_photo_url }}"/>
                                @else
                                    <span class="symbol-label {{random_bg()}} fw-bold">
                                        {{substr($user->first_name, 0, 1)}}
                                    </span>
                                @endif
                            </div>
                        @endforeach
                        @if($exhibitor["total"]>6)
                            <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal"
                               data-bs-target="#kt_modal_view_users">
                                <span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">
                                    +{{$exhibitor["total"]-6}}
                                </span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                <div class="card-header pt-5">
                    <div class="card-title d-flex flex-column">
                        <div class="d-flex align-items-center">
                            <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">Ksh</span>
                            <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">
                                {{$kes_earning["total_sum"]}}
                            </span>
                        </div>
                        <span class="text-gray-400 pt-1 fw-semibold fs-6">
                            Total Earnings in KES
                        </span>
                    </div>
                </div>
                <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                    <div class="d-flex flex-column content-justify-center flex-row-fluid">
                        <div class="d-flex fw-semibold align-items-center">
                            <div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>
                            <div class="text-gray-500 flex-grow-1 me-4">Booth Amount</div>
                            <div class="fw-bolder text-gray-700 text-xxl-end">
                                {{$kes_earning["booth_sum"]}}
                            </div>
                        </div>
                        <div class="d-flex fw-semibold align-items-center my-3">
                            <div class="bullet w-8px h-3px rounded-2 bg-primary me-3"></div>
                            <div class="text-gray-500 flex-grow-1 me-4">Ticket Amount</div>
                            <div class="fw-bolder text-gray-700 text-xxl-end">
                                {{$kes_earning["ticket_sum"]}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                <div class="card-header pt-5">
                    <div class="card-title d-flex flex-column">
                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{$delegate["total"]}}</span>
                        <a href="{{route("users.delegates.index")}}">
                            <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Delegates</span>
                        </a>
                    </div>
                </div>
                <div class="card-body d-flex flex-column justify-content-end pe-0">
                    <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Recent Signups</span>
                    <div class="symbol-group symbol-hover flex-nowrap">
                        @foreach($delegate["list"] as $user)
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                 title="{{$user->name}}">
                                @if ($user->profile_photo_path)
                                    <img alt="{{$user->name}}" src="{{ $user->profile_photo_url }}"/>
                                @else
                                    <span class="symbol-label {{random_bg()}} fw-bold">
                                        {{substr($user->first_name, 0, 1)}}
                                    </span>
                                @endif
                            </div>
                        @endforeach
                        @if($delegate["total"]>6)
                            <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal"
                               data-bs-target="#kt_modal_view_users">
                                <span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">
                                    +{{$delegate["total"]-6}}
                                </span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                <div class="card-header pt-5">
                    <div class="card-title d-flex flex-column">
                        <div class="d-flex align-items-center">
                            <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                            <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">
                                {{$usd_earning["total_sum"]}}
                            </span>
                        </div>
                        <span class="text-gray-400 pt-1 fw-semibold fs-6">
                            Total Earnings in USD
                        </span>
                    </div>
                </div>
                <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                    <div class="d-flex flex-column content-justify-center flex-row-fluid">
                        <div class="d-flex fw-semibold align-items-center">
                            <div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>
                            <div class="text-gray-500 flex-grow-1 me-4">Booth Amount</div>
                            <div class="fw-bolder text-gray-700 text-xxl-end">
                                {{$usd_earning["booth_sum"]}}
                            </div>
                        </div>
                        <div class="d-flex fw-semibold align-items-center my-3">
                            <div class="bullet w-8px h-3px rounded-2 bg-primary me-3"></div>
                            <div class="text-gray-500 flex-grow-1 me-4">Ticket Amount</div>
                            <div class="fw-bolder text-gray-700 text-xxl-end">
                                {{$usd_earning["ticket_sum"]}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                <div class="card-header pt-5">
                    <div class="card-title d-flex flex-column">
                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{$coupons["total"]}}</span>
                        <a href="{{route("users.delegates.index")}}">
                            <span class="text-gray-400 pt-1 fw-semibold fs-6">Delegates registered with coupons</span>
                        </a>
                    </div>
                </div>
                <div class="card-body d-flex flex-column justify-content-end pe-0">
                    <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Recent Signups</span>
                    <div class="symbol-group symbol-hover flex-nowrap">
                        @foreach($coupons["list"] as $user)
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                 title="{{$user->first_name}} {{$user->last_name}}">
                                @if ($user->profile_photo_path)
                                    <img alt="{{$user->name}}" src="{{ $user->profile_photo_url }}"/>
                                @else
                                    <span class="symbol-label {{random_bg()}} fw-bold">
                                        {{substr($user->first_name, 0, 1)}}
                                    </span>
                                @endif
                            </div>
                        @endforeach
                        @if($coupons["total"]>6)
                            <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal"
                               data-bs-target="#kt_modal_view_users">
                                <span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">
                                    +{{$coupons["total"]-6}}
                                </span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
  @endcan
    <div class="row">
        <div class="col-md-12">
            <div class="card card-flush h-md-100">
                <div class="card-header pt-7">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">Recent Transactions</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-sm btn-light">View All</a>
                    </div>
                </div>
                <div class="card-body pt-6">
                    <div class="table-responsive">
                        <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                            <thead>
                            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                <th class="p-0 pb-3 min-w-175px text-start">CLIENT</th>
                                <th class="p-0 pb-3 min-w-175px text-start">INVOICE NO.</th>
                                <th class="p-0 pb-3 min-w-100px text-start">BILL DESCRIPTION</th>
                                <th class="p-0 pb-3 min-w-100px text-start">AMOUNT</th>
                                <th class="p-0 pb-3 min-w-175px text-start">STATUS</th>
                                <th class="p-0 pb-3 min-w-175px text-start">CREATED AT</th>
                                <th class="p-0 pb-3 w-50px text-end">VIEW</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                    {{$transaction->payload["clientName"]}}
                                                </a>
                                                <span class="text-gray-400 fw-semibold d-block fs-7">
                                                   {{$transaction->payload["clientMSISDN"]}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-start pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">
                                            {{$transaction->invoice_number}}
                                        </span>
                                    </td>
                                    <td class="text-start pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">
                                            {{$transaction->payload["billDesc"]}}
                                        </span>
                                    </td>
                                    <td class="text-start pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">
                                            {{format_amount($transaction->amount_expected,$transaction->currency)}}
                                        </span>
                                    </td>
                                    <td class="text-start pe-0">
                                        {!! get_status($transaction->status->value) !!}
                                    </td>
                                    <td class="text-start pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">
                                         {{$transaction->created_at->format('dS M, Y')}}, {{$transaction->created_at->diffForHumans()}}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{route("payments.show",["invoiceNo"=>$transaction->invoice_number])}}"
                                           class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            {!! getIcon('black-right', 'fs-2 text-gray-500') !!}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-default-layout>
