<div style="font-family:system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; color:#1b3650;">
    <p>Hi {{ $name ?? 'there' }},</p>

    <p>
        This is a reminder to complete your payment for purchase <strong>{{ $reference }}</strong>.
        Click the link below to open your invoice and complete payment:
    </p>

    <p>
        <a href="{{ $invoiceLink }}" target="_blank" rel="noopener noreferrer">Pay now</a>
    </p>

    <p>If you didn't initiate this purchase or need assistance, reply to this email and we'll help.</p>

    <p>Thanks,<br>The Events Team</p>
</div>