<?php
$tickets = is_array($row->tickets) ? $row->tickets : (json_decode($row->tickets, true) ?: []);
?>
<div class="text-sm">
    @foreach($tickets as $t)
        @if(is_array($t))
        <div class="mb-1">
            <strong>Type:</strong> {{ $t['category_id'] ?? ($t['type'] ?? 'N/A') }} <br />
            <strong>Amount:</strong> {{ isset($t['total']) ? number_format($t['total'], 2) : (isset($t['price']) ?
            number_format($t['price'],2) : '-') }} <br />
            <strong>Count:</strong> {{ $t['count'] ?? 1 }}

        </div>
        @endif
    @endforeach
</div>
