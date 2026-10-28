<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Certificate validation</title>
    <style>
        body { margin: 0; padding: 2rem; background: #f5f8fa; color: #181c32; font-family: Arial, sans-serif; }
        main { box-sizing: border-box; max-width: 560px; margin: 10vh auto; padding: 2rem; background: #fff; border-radius: 12px; box-shadow: 0 4px 24px #181c3214; }
        h1 { margin-top: 0; }
        .status { color: #16794b; font-weight: 700; }
        dt { margin-top: 1.25rem; color: #7e8299; font-size: .85rem; }
        dd { margin: .35rem 0 0; font-weight: 600; }
    </style>
</head>
<body>
<main>
    <p class="status">Certificate verified</p>
    <h1>{{ $delegate->name }}</h1>
    <dl>
        <dt>Type</dt>
        <dd>{{ ucfirst($delegate->type) }}</dd>
        <dt>Event</dt>
        <dd>{{ $delegate->event->title }}</dd>
        <dt>Serial number</dt>
        <dd>{{ $delegate->serial_number }}</dd>
    </dl>
</main>
</body>
</html>
