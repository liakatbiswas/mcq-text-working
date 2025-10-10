<div class="max-w-2xl mx-auto mt-8">
    <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Edit Role</h2>

    <form wire:submit.prevent="updateRole" class="space-y-4">
        {{-- Role Name --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role Name</label>
            <input type="text" wire:model="name" class="form-input" placeholder="Enter role name">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Permissions --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Assign Permissions</label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mt-2">
                @foreach ($permissions as $permission)
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" wire:model="selectedPermissions" value="{{ $permission->id }}"
                            class="form-checkbox">
                        <span class="text-gray-700 dark:text-gray-300">{{ $permission->name }}</span>
                    </label>
                @endforeach
            </div>
            @error('selectedPermissions')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Buttons --}}
        <div class="flex items-center gap-3 mt-4">
            <button type="submit" class="btn-primary">Update Role</button>
            <a href="{{ route('roles.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>
