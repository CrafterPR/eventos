<x-auth-layout>
    <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20" >
        <h3 class="title_h3">Reset you password</h3>
        @if (session('status'))
            <div class="alert alert-success">
        {{ session('status') }}
    </div>
        @endif
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" data-kt-redirect-url="{{ route('login') }}"
          action="{{ route('password.request') }}" method="POST">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">
                Forgot Password ?
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-500 fw-semibold fs-6">
                Enter your email to reset your password.
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent  @error('email') border-danger @enderror " value=""/>
            @error('email')
            <div class="error-message">{{ $message }}</div>
            @enderror

            <!--end::Email-->
        </div>

        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="submit" id="kt_password_reset_submit" class="btn btn-success me-4">
                @include('partials/general/_button-indicator', ['label' => 'Submit'])
            </button>

            <a href="{{ route('login') }}" class="btn btn-light">Cancel</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
    </div>

</x-auth-layout>
