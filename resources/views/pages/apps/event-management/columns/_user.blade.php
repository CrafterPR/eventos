<!--begin:: Avatar -->
<div class="d-flex">
    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="{{ route('events.delegates.show', $row->user) }}">
            @if($row->user->profile_photo_url)
                <div class="symbol-label">
                    <img src="{{ $row->user->profile_photo_url }}" class="w-100"/>
                </div>
            @else
                <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $row->user->name) }}">
                    {{ Str::upper(substr($row->user->first_name, 0, 1)) }}{{ Str::upper(substr($row->user->last_name, 0, 1)) }}
                </div>
            @endif
        </a>
    </div>
    <!--end::Avatar-->
    <!--begin::User details-->
    <div class="d-flex flex-column">
        <a href="{{ route('events.delegates.show', $row->user) }}" class="text-gray-800 text-hover-primary mb-1">
            {{ $row->user->salutation }} {{ $row->user->first_name }}  {{ $row->user->last_name }}
        </a>
        <a href="{{ route('events.delegates.show', $row->user) }}" class="text-gray-800 text-hover-primary mb-1">
            <span>{{$row->user->email}}</span>
        </a>
    </div>
</div>
