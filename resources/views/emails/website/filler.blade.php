<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>KIW 2023 Contact Form</title>
</head>
<body style="background-image:url('{{ asset('images/KN-230407-897.jpg') }}') ">
<div style="text-align: center;">
    <img src="{{ image('images/KN-230407-668.jpg') }}" alt="KIW 2023" style="max-width: 200px; margin-bottom: 20px;">
    <h2 style="margin-bottom: 30px; color: #faa819">{{ $data['subject'] }}</h2>
</div>

<div style="max-width: 600px; margin: 0 auto; font-size: 1.4rem; color: #fff !important">
    @if($data['type'] === 'sponsorship')
        <p>Dear {{ $data['first_name'] }}, <br />
            Thank you so much for your interest in sponsoring KIW 2023!
            We appreciate you taking the time to fill out our form. <br />
            Our team will review your submission and reach out to you soon to
            discuss the exciting sponsorship packages and opportunities we have available. <br />
            If you have questions or concerns in the meantime, please don't hesitate to let us know. <br />
            Thank you again for considering partnering with us.
        </p>
        <br />
        <br />
        Thank you,
        <br />
        The KIW Secretariat
        <br /><br /><br />
    @elseif($data['type'] === 'exhibition')
        <p>Dear {{ $data['first_name'] }}!,<br />
            We appreciate your interest in exhibiting at our upcoming event and are thrilled to have you consider being a part of it. <br />
            Our team will notify you soon as the floor plan and other exhibition details are firmed up to get you the first dibs on the prime slots.<br />
            We look forward to partnering with you to make KIW 2023 a success! If you have any questions or concerns in the meantime, <br />
            please don't hesitate to let us know.</p>

        <br />
        <br />
        Thank you,
        <br />
        The KIW Secretariat
        <br /><br /><br />

    @else
        Dear {{ $data['first_name'] }} {{ $data['last_name'] }},

        Thank you for reaching out to us at KIW 2023. We’ll get back to you soon. <br/>

        You can continue to explore the event here {{ route('index', [], true) }} <br />

        <br />
        Thank you,
        <br />
        The KIW Secretariat
        <br /><br /><br />
    @endif

</div>
</body>
</html>
