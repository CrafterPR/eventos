<p>Hello {{ $sponsorship->contact_name }},</p>

<p>We have received your sponsorship application. Here are the company and package details:</p>

<ul>
    <li><strong>Company:</strong> {{ $sponsorship->company_name }}</li>
    <li><strong>Physical address:</strong> {{ $sponsorship->physical_address }}</li>
    <li><strong>Company email:</strong> {{ $sponsorship->company_email }}</li>
    <li><strong>Contact person:</strong> {{ $sponsorship->contact_name }}</li>
    <li><strong>Contact email:</strong> {{ $sponsorship->contact_email }}</li>
    <li><strong>Contact mobile:</strong> {{ $sponsorship->contact_mobile }}</li>
    <li><strong>Package:</strong> {{ $sponsorship->package }}</li>
    <li><strong>Amount:</strong> {{ $sponsorship->currency }} {{ number_format((float) $sponsorship->amount, 2) }}</li>
</ul>

@if($paymentLink)
    <p><a href="{{ $paymentLink }}">Continue to secure payment</a></p>
@endif

@if($password)
    <p>Your account has been created. Sign in at <a href="{{ route('login') }}">{{ route('login') }}</a> using this email and temporary password: <strong>{{ $password }}</strong></p>
@else
    <p>Your sponsorship is linked to your existing account. Sign in at <a href="{{ route('login') }}">{{ route('login') }}</a>.</p>
@endif
