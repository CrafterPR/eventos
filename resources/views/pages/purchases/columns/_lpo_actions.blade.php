<div class="flex items-center gap-2">
    <a href="{{ route('events.purchases.show', $row) }}" class="btn btn-sm btn-light">View</a>

    <form method="POST" action="{{ route('events.purchases.resend_reminder', $row) }}" style="display:inline-block;">
        @csrf
        <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Send reminder for {{ $row->reference }}?')">Resend</button>
    </form>
</div>