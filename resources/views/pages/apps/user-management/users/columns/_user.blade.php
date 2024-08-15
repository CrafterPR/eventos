<!--begin::User details-->
<div class="d-flex flex-column">
    <a href="{{ route('users.user.show', $user) }}" class="text-gray-800 text-hover-primary mb-1">
        {{ $user->first_name }}  {{ $user->last_name }}
    </a>
    <span>{{ $user->email }}</span>
</div>
<!--begin::User details-->
