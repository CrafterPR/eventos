<div class="modal fade" id="kt_modal_edit_delegate" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-950px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Edit Delegate</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross','fs-1') !!}
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_user_form" class="form" action="#" wire:submit.prevent="submit"
                      enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                         data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_add_user_header"
                         data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="100%">
                        <!--begin::Input group-->
                        @csrf
                        <div class="row mb-6">
                        <div class="col-md-2">
                            <div class="form-floating mb-3">
                                <select wire:model="delegate.salutation" id="select_salutation"
                                        class="form-select custom-select2 @error('delegate.salutation') border-danger @enderror"
                                        data-control="select2"
                                        data-placeholder="">
                                    <option value=""></option>
                                    @foreach (config("setting.salutation") as $salutation)
                                        <option value="{{ $salutation }}" {{ $salutation == $delegate->salutation ? 'selected' : '' }}>
                                        {{$salutation}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="salutation">Title</label>
                                @error('delegate.salutation')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-floating mb-3">
                                <input type="text" wire:model="delegate.first_name" autocomplete="off"
                                       class="form-control   @error('delegate.first_name') border-danger @enderror"/>
                                <label for="first_name">
                                    First name
                                    <span class="required"></span>
                                </label>
                                @error('delegate.first_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-floating mb-3">
                                <input type="text" wire:model="delegate.last_name" id="last_name"
                                       autocomplete="off"
                                       value="{{ old("last_name") }}"
                                       class="form-control   @error('delegate.last_name') border-danger @enderror"/>
                                <label for="last_name">
                                    Last name
                                    <span class="required"></span>
                                </label>
                                @error('delegate.last_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" wire:model="delegate.email" id="email"
                                       value="{{ old("email") }}"
                                       autocomplete="off"
                                       class="form-control  @error('delegate.email') border-danger @enderror "/>
                                <label for="email">
                                    Email address
                                    <span class="required"></span>
                                </label>
                                @error('delegate.email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="tel" wire:model="delegate.mobile" id="mobile"
                                       value="{{ old("mobile") }}"
                                       autocomplete="off"
                                       class="form-control  @error('delegate.mobile') border-danger @enderror "/>
                                <label for="mobile">
                                    Phone number
                                </label>
                                @error('delegate.mobile')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" wire:model="delegate.organization" id="organization"
                                       value="{{ old("organization") }}"
                                       autocomplete="off"
                                       class="form-control  @error('delegate.organization') border-danger @enderror "/>
                                <label for="institution">
                                    Organization
                                    <span class="required"></span>
                                </label>
                                @error('delegate.organization')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select wire:model="delegate.gender"
                                        class="form-select  @error('delegate.gender') border-danger @enderror "
                                        data-control="select2"
                                        data-placeholder="">
                                    <option value=""></option>
                                    @foreach(config("setting.gender") as $key=>$value)
                                        <option value="{{$key}}" {{$delegate->gender == $key ? 'selected' : ''}}>{{$value}}</option>
                                    @endforeach
                                </select>
                                <label for="gender">Gender
                                    <span class="required"></span>
                                </label>
                                @error('delegate.gender')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        </div>
                        <div class="row mb-6">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select wire:model="delegate.country_id" id="select_country_id"
                                            class="form-select  @error('delegate.country_id') border-danger @enderror "
                                            data-control="select2"
                                            data-placeholder="">
                                        <option value=""></option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id  }}" {{ $country->id == $delegate->country_id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="country_id">
                                         Country
                                        <span class="required"></span>
                                    </label>
                                    @error('delegate.country_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3 readonly" id="county">
                                    <select wire:model="delegate.county_id" id="select_county_id"
                                            class="form-select"
                                            data-control="select2"
                                            data-placeholder="">
                                        <option value="">Select County</option>
                                    </select>
                                    <label for="county_id">County</label>
                                    @error('delegate.county_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6 mt-4">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select wire:model="delegate.category_id" id="select_category_id"
                                            class="form-select custom-select2  @error('delegate.category_id') border-danger @enderror "
                                            data-control="select2"
                                            data-placeholder="">
                                        <option value=""></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $delegate->category_id ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="category_id">
                                        Delegate category
                                        <span class="required"></span>
                                    </label>
                                    @error('delegate.category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="delegate.event_id" id="select_event_id"
                                                class="form-select  @error('delegate.event_id') border-danger @enderror "
                                                data-control="select2"
                                                data-placeholder="">
                                            <option value=""></option>
                                            @foreach($events as $event)
                                                <option value="{{ $event->id  }}" {{ $event->id == $delegate->event_id ? 'selected' : '' }}>
                                                    {{ $event->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="event_id">
                                            Event
                                            <span class="required"></span>
                                        </label>
                                        @error('delegate.event_id')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                        </div>

                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close"
                                    wire:loading.attr="disabled">Discard
                            </button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label" wire:loading.remove>Submit</span>
                                <span class="indicator-progress" wire:loading wire:target="submit">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
@push('scripts')
    <script>
        $(function () {
            let selectOptions = ['gender', 'salutation', 'country_id', 'county_id', 'event_id', 'category_id'];

            selectOptions.map(function (option) {
                $(`#select_${option}`).on('change', function (e) {
                    var data = $(`#select_${option}`).select2("val");
                @this.set(`delegate.${option}`, data);
                });
            });

        });

    </script>
@endpush
