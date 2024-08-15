<x-auth-layout>
    <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-500px p-20">
        <div class="row">
        <h3 class="title_h4 col-md-7">{{ env('APP_NAME') }}  Portal</h3>
            <img src="{{ asset('assets/media/images/logo.svg') }}" alt="Logo" class="img img-fluid col-md-5"/>
{{--        <img src="{{ asset('assets/media/images/green_logo.svg') }}" alt=" image here" class="position_logo col-md-4"/>--}}
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
            <div class="d-grid mb-10 bg-hover-secondary">
                <button type="submit" class="btn btn-success text-hover-success">
                    @include('partials/general/_button-indicator', ['label' => 'Sign In'])
                </button>
            </div>

        </form>
    </div>
</x-auth-layout>
