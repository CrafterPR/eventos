<!--begin:: Avatar -->
<div class="d-flex">
<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
    <a href="{{ route('users.delegates.show', $row) }}">
        @if($row->profile_photo_url)
            <div class="symbol-label">
                <img src="{{ $row->profile_photo_url }}" class="w-100"/>
            </div>
        @else
            <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $row->name) }}">
                {{ Str::upper(substr($row->first_name, 0, 1)) }}{{ Str::upper(substr($row->last_name, 0, 1)) }}
            </div>
        @endif
    </a>
</div>
<!--end::Avatar-->
<!--begin::User details-->
<div class="d-flex flex-column">
    <a href="{{ route('users.delegates.show', $row) }}" class="text-gray-800 text-hover-primary mb-1">
        {{ $row->salutation }} {{ $row->first_name }}  {{ $row->last_name }}
    </a>
    <a href="{{ route('users.delegates.show', $row) }}" class="text-gray-800 text-hover-primary mb-1">
    <span>{{$row->email}}</span>
    </a>
</div>
</div>
