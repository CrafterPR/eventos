@foreach($roles as $role)
    <a href="{{ route('users.role.show', $role) }}" class="badge fs-7 m-1 {{ app(\App\Actions\GetThemeType::class)->handle('badge-light-?', $role->name) }}">
        {{ $role->name }}
    </a>
@endforeach
