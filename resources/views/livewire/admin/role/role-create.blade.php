<form wire:submit.prevent="save">
    <!-- Name -->
    <div class="mb-4">
        <label for="name" class="label">Name</label>
        <input wire:model.defer="name" type="text" id="name" class="form-input">
        @error('name')
            <span class="text-red-400 text-sm mt-1">{{ $message }}</span>
        @enderror
    </div>

    <!-- Permissions -->
    <h3 class="font-semibold mb-2">Permissions</h3>
    <div class="flex flex-wrap -mx-4">
        @foreach ($permissions as $permission)
            <div class="w-1/3 px-4 mb-2">
                <label class="inline-flex items-center">
                    <input wire:model="selectedPermissions" type="checkbox" value="{{ $permission->name }}">
                    <span class="ml-2">{{ $permission->name }}</span>
                </label>
            </div>
        @endforeach
        @error('selectedPermissions')
            <span class="text-red-400 text-sm mt-1">{{ $message }}</span>
        @enderror
    </div>

    <!-- Submit -->
    @include('components.wire-loading-btn', [
        'label' => 'Save Role',
    ])

</form>
