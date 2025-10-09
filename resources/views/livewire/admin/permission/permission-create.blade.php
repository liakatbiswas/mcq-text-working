<div class="max-w-2xl mx-auto">
    <form wire:submit.prevent="savePermission" class="mb-8 space-y-3">
        <label for="name" class="label">Name</label>
        <input wire:model="name" type="text" id="name" placeholder="Enter permission name" class="form-input">
        @error('name')
            <div class="text-red-400 text-sm">{{ $message }}</div>
        @enderror

        @include('components.wire-loading-btn', [
            'label' => 'Save Permission',
            'methodName' => 'savePermission',
        ])
    </form>
</div>
