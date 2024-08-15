<!--begin:: Avatar -->
<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
    <a href="{{ route('users.user.show', $speaker) }}">
        @if($speaker->image_path)
            <div class="symbol-label">
                <img src="{{ asset('storage/'.$speaker->image_path) }}" class="w-100"/>
            </div>
        @else
            <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $speaker->name) }}">
                {{ substr($speaker->name, 0, 2) }}
            </div>
        @endif
    </a>
</div>
<!--end::Avatar-->
<!--begin::User details-->
<div class="d-flex flex-column">
    <a href="{{ route('users.user.show', $speaker) }}" class="text-gray-800 text-hover-primary mb-1">
        {{ $speaker->name }}
    </a>
</div>
<!--begin::User details-->
