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
         @foreach ($activePositions as $posKey=>$position)
            <div class="col-md-{{ $colValue }} col-lg-6 col-xl-{{ $colValue }} col-xxl-{{ $colValue }} mb-md-{{ $colValue }} mb-xl-10">
            <div class="card card-flush h-auto mb-5 mb-xl-10">
                <div class="card-header pt-5">
                    <div class="card-title d-flex flex-column">
                        <div class="d-flex align-items-center">
{{--                            <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">Ksh</span>--}}
                            <span class="fs-2hx fw-bold text-{{ getIconVal($posKey) }} text-hover-muted me-2 lh-1 ls-n2">
                                {{ $position->title }}
                            </span>
                        </div>
                        <span class="text-gray-400 pt-1 fw-semibold fs-6">
                            Total votes cast <strong>{{$position->votes_count}}</strong>
                        </span>
                    </div>
                </div>
                <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                    <div class="d-flex flex-column content-justify-center flex-row-fluid">
                        @forelse($position->contestants as $key=>$contestant)
                        <div class="d-flex fw-semibold align-items-center">
                            <div class="bullet w-8px h-3px rounded-2 bg-{{ getIconVal($key)}} me-3"></div>
                            <div class="text-gray-500 flex-grow-1 me-4">{{  $contestant->full_name }} </div>
                            <div class="fw-bolder text-gray-700 text-xxl-end">
                                {{ $contestant->votes_count }}
                            </div>
                        </div>
                        @empty
                            <div class="d-flex fw-semibold align-items-center">
                            <div class="flex-grow-1 me-4 text-secondary text-warning">No contestants added </div>

                        </div>
                        @endforelse

                    </div>
                </div>
            </div>

        </div>
        @endforeach

    </div>
  @endcan

</x-default-layout>
