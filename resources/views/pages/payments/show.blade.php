@php(extract($data))

<x-default-layout>
    @section('title')
        Payment Details
    @endsection

    {{--@section('breadcrumbs')
        {{ Breadcrumbs::render('payments') }}
    @endsection--}}

    <div class="card mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0">
            <div class="d-flex flex-wrap flex-sm-nowrap">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-2">
                                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                                    {{$user->name}}
                                </a>
                                <a href="#">
                                    <i class="ki-duotone ki-verify fs-1 text-primary">
                                        <span class="path1"></span><span class="path2"></span>
                                    </i>
                                </a>
                            </div>
                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                <a href="#"
                                   class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                        <span class="path1"></span><span class="path2"></span>
                                        <span class="path3"></span></i>
                                    {{ucfirst($user->user_type->value)}}
                                </a>
                                <a href="#"
                                   class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <i class="ki-duotone ki-geolocation fs-4 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    {{$user->institution}}
                                </a>
                                <a href="#"
                                   class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                    <i class="ki-duotone ki-sms fs-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span></i>
                                    {{$user->email}}
                                </a>
                            </div>
                        </div>
                        <div class="d-flex my-4">
                            <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal"
                               data-bs-target="#kt_modal_offer_a_deal">View Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Navbar-->
    <!--begin::Billing Summary-->
    <div class="card  mb-5 mb-xl-10">
        <!--begin::Card body-->
        <div class="card-body">

            <!--begin::Notice-->
            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-12 p-6">
                <!--begin::Icon-->
                <i class="ki-duotone ki-information fs-2tx text-warning me-4"><span class="path1"></span><span
                        class="path2"></span><span class="path3"></span></i>        <!--end::Icon-->

                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-grow-1 ">
                    <!--begin::Content-->
                    <div class=" fw-semibold">
                        <h4 class="text-gray-900 fw-bold">We need your attention!</h4>

                        <div class="fs-6 text-gray-700 ">Your payment was declined. To start using tools, please
                            <a href="#" class="fw-bold" data-bs-toggle="modal"
                               data-bs-target="#kt_modal_new_card">Add Payment Method</a>.
                        </div>
                    </div>
                    <!--end::Content-->

                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Notice-->

            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-7">
                    <!--begin::Heading-->
                    <h3 class="mb-2">Active until Dec 09, 2023</h3>
                    <p class="fs-6 text-gray-600 fw-semibold mb-6 mb-lg-15">We will send you a notification upon
                        Subscription expiration </p>
                    <!--end::Heading-->

                    <!--begin::Info-->
                    <div class="fs-5 mb-2">
                        <span class="text-gray-800 fw-bold me-1">$24.99</span>
                        <span class="text-gray-600 fw-semibold">Per Month</span>
                    </div>
                    <!--end::Info-->

                    <!--begin::Notice-->
                    <div class="fs-6 text-gray-600 fw-semibold">
                        Extended Pro Package. Up to 100 Agents &amp; 25 Projects
                    </div>
                    <!--end::Notice-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-lg-5">
                    <!--begin::Action-->
                    <div class="d-flex justify-content-end pb-0 px-0">
                        <a href="#" class="btn btn-light btn-active-light-primary me-2"
                           id="kt_account_billing_cancel_subscription_btn">Cancel Subscription</a>
                        <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_upgrade_plan">Upgrade Plan
                        </button>
                    </div>
                    <!--end::Action-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Billing Summary-->

    <!--begin::Billing Address-->
    <div class="card  mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Title-->
            <div class="card-title">
                <h3>Billing Address</h3>
            </div>
            <!--end::Title-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Addresses-->
            <div class="row gx-9 gy-6">
                <!--begin::Col-->
                <div class="col-xl-6" data-kt-billing-element="address">
                    <!--begin::Address-->
                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                        <!--begin::Details-->
                        <div class="d-flex flex-column py-2">
                            <div class="d-flex align-items-center fs-5 fw-bold mb-5">
                                Address 1
                                <span class="badge badge-light-success fs-7 ms-2">Primary</span>
                            </div>

                            <div class="fs-6 fw-semibold text-gray-600">
                                Ap #285-7193 Ullamcorper Avenue<br>
                                Amesbury HI 93373<br>US
                            </div>
                        </div>
                        <!--end::Details-->

                        <!--begin::Actions-->
                        <div class="d-flex align-items-center py-2">
                            <button class="btn btn-sm btn-light btn-active-light-primary me-3"
                                    data-kt-billing-action="address-delete">

                                <!--begin::Indicator label-->
                                <span class="indicator-label">
    Delete</span>
                                <!--end::Indicator label-->

                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">
    Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
</span>
                                <!--end::Indicator progress-->
                            </button>
                            <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_new_address">Edit
                            </button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Address-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-xl-6" data-kt-billing-element="address">
                    <!--begin::Address-->
                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                        <!--begin::Details-->
                        <div class="d-flex flex-column py-2">
                            <div class="d-flex align-items-center fs-5 fw-bold mb-3">
                                Address 2
                            </div>

                            <div class="fs-6 fw-semibold text-gray-600">
                                Ap #285-7193 Ullamcorper Avenue<br>
                                Amesbury HI 93373<br>US
                            </div>
                        </div>
                        <!--end::Details-->

                        <!--begin::Actions-->
                        <div class="d-flex align-items-center py-2">
                            <button class="btn btn-sm btn-light btn-active-light-primary me-3"
                                    data-kt-billing-action="address-delete">

                                <!--begin::Indicator label-->
                                <span class="indicator-label">
    Delete</span>
                                <!--end::Indicator label-->

                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">
    Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
</span>
                                <!--end::Indicator progress-->
                            </button>
                            <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_new_address">Edit
                            </button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Address-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-xl-6" data-kt-billing-element="address">
                    <!--begin::Address-->
                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                        <!--begin::Details-->
                        <div class="d-flex flex-column py-2">
                            <div class="d-flex align-items-center fs-5 fw-bold mb-3">
                                Address 3
                            </div>

                            <div class="fs-6 fw-semibold text-gray-600">
                                Ap #285-7193 Ullamcorper Avenue<br>
                                Amesbury HI 93373<br>US
                            </div>
                        </div>
                        <!--end::Details-->

                        <!--begin::Actions-->
                        <div class="d-flex align-items-center py-2">
                            <button class="btn btn-sm btn-light btn-active-light-primary me-3"
                                    data-kt-billing-action="address-delete">

                                <!--begin::Indicator label-->
                                <span class="indicator-label">
    Delete</span>
                                <!--end::Indicator label-->

                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">
    Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
</span>
                                <!--end::Indicator progress-->
                            </button>
                            <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_new_address">Edit
                            </button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Address-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-xl-6">

                    <!--begin::Notice-->
                    <div
                        class="notice d-flex bg-light-primary rounded border-primary border border-dashed flex-stack h-xl-100 mb-10 p-6">

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                            <!--begin::Content-->
                            <div class="mb-3 mb-md-0 fw-semibold">
                                <h4 class="text-gray-900 fw-bold">This is a very important note!</h4>

                                <div class="fs-6 text-gray-700 pe-7">Writing headlines for blog posts is much
                                    science and probably cool audience
                                </div>
                            </div>
                            <!--end::Content-->

                            <!--begin::Action-->
                            <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap"
                               data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">
                                New Address </a>
                            <!--end::Action-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Addresses-->

            <!--begin::Tax info-->
            <div class="mt-10">
                <h3 class="mb-3">Tax Location</h3>

                <div class="fw-semibold text-gray-600 fs-6">
                    United States - 10% VAT<br>
                    <a class="fw-bold" href="#">More Info</a>
                </div>
            </div>
            <!--end::Tax info-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Billing Address-->
    <!--begin::Billing History-->


</x-default-layout>
