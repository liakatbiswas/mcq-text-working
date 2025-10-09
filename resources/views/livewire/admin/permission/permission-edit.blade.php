<div class="max-w-lg mx-auto mt-8">
    <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Edit Permission</h2>

    <form wire:submit.prevent="updatePermission" class="space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Permission
                Name</label>
            <input wire:model="name" type="text" id="name"
                class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white"
                placeholder="Enter permission name">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-3">
            @include('components.wire-loading-btn', [
                'label' => 'Update Permission',
                'methodName' => 'updatePermission',
            ])

            <a href="{{ route('permissions.index') }}" class="btn-cancel"> Cancel </a>
        </div>
    </form>
</div>
