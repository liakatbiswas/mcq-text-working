<div>
    <h2 class="text-2xl font-bold"> Role Name: {{ $role->name }}</h2>

    <ul>
        @foreach ($role->permissions as $permission)
            <li> {{ $permission->name }}</li>
        @endforeach
    </ul>
</div>
