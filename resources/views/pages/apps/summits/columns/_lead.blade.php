<!--begin:: Avatar -->
<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
    <a href="#">
        @if($summit->profile_photo_url)
            <div class="symbol-label">
                <img src="{{ url('storage/speakers/'.$summit->profile_photo_url) }}" class="w-100"/>
            </div>
        @else
            <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $summit->leader) }}">
                {{ substr($summit->leader, 0, 1) }}
            </div>
        @endif
    </a>
</div>
<!--end::Avatar-->
<!--begin::User details-->
<div class="d-flex flex-column">
    <a href="#" class="text-gray-800 text-hover-primary mb-1">
        {{ $summit->leader }}
    </a>
    <span>{{ $summit->leader_contact }}</span>
</div>
<!--begin::User details-->