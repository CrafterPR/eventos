<x-auth-layout>
    <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-500px p-20">
        <div class="row">
        <h3 class="title_h4 col-md-10 pb-3">
            <img src="{{ asset('assets/media/images/2nd KICP-logo-01.png') }}" alt="Logo" class="img img-fluid
            col-md-5"/> Portal Login
        </h3>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
        {{ session('status') }}
    </div>
        @endif
        <form class="form w-100" action="{{ route('login')}}" method="POST">
            @csrf
            <div class="form-floating mb-8">
                <input type="email" name="email" id="email" autocomplete="off" class="form-control bg-transparent"
                       value="{{old("email")}}"/>
                <label for="password">Email<span class="required"></span></label>
                @error('email')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-8">
                <input type="password" name="password" id="password" autocomplete="off"
                       class="form-control bg-transparent" />
                <label for="password">
                    Password<span class="required"></span></label>
                @error('password')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                <div></div>
                <a href="{{ route('password.request') }}" class="link-primary">Forgot Password?</a>
            </div>
            <div class="d-grid mb-10 bg-hover-primary">
                <button type="submit" class="btn btn-danger text-white">
                    @include('partials/general/_button-indicator', ['label' => 'Sign In'])
                </button>
            </div>
            <div class="text-gray-500 text-center fw-semibold fs-6">
                <a href="{{ route('/') }}" class="btn btn-light btn-active-light-primary text-center">
                    Back to homepage
                </a>
            </div>

        </form>
    </div>
</x-auth-layout>
