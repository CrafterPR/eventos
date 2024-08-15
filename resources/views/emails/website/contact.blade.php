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
        <p>Hi admin!, <br />
            {{ $data['first_name'] }} {{ $data['last_name'] }}, a {{ $data['position'] }} from {{ $data['organisation'] }}, has expressed interest in sponsoring KIW2023. You can find further details below:
         <br />
             Nature of Sponsorship: {{ $data['nature_of_sponsorship'] }}
         <br />
            Contact Details: {{ $data['email'] }} | {{ $data['phone'] }}
        </p>
        <br />
        <br />
        Thank you,
        <br />
        The KIW Secretariat
    @elseif($data['type'] === 'exhibition')
        <p>Hi admin!,<br />
            {{ $data['first_name'] }} {{ $data['last_name'] }}, a {{ $data['position'] }} from {{ $data['organisation'] }}, has expressed interest in exhibiting at KIW2023. You can find further details below:
        </p>
        <br />
        Nature of Exhibition: {{ $data['nature_of_exhibition'] }}
        <br />
        Contact Details: {{ $data['email'] }} | {{ $data['phone'] }}
         <br />
         <br />
        Thank you,
         <br />
        The KIW Secretariat
    @elseif($data['type'] === 'speakers')
        Hi admin!, <br />
        {{ $data['first_name'] }} {{ $data['last_name'] }}, a {{ $data['position'] }} from {{ $data['organisation'] }}, has expressed interest in speaking at KIW2023. You can find further details below:

        Summit of Interest: {{ $data['summit'] }}

        Contact Details: {{ $data['email'] }} | {{ $data['phone'] }}
         <br />
         <br />
        Thank you,
          <br />
        The KIW Secretariat
    @else
        Hi {{ $data['first_name'] }} {{ $data['last_name'] }},

        Thank you for reaching out to us at KIW 2023. We’ll get back to you soon. <br/>

        You can continue to explore the event here {{ route('index', [], true) }} <br />

         <br />
        Thank you,
         <br />
        The KIW Secretariat
    @endif

</div>
</body>
</html>
