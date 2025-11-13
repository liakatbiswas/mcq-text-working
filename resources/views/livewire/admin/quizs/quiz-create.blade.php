<div>
    <form wire:submit.prevent="saveQuiz" class="w-full">
        <div class="flex flex-col sm:flex-row items-start sm:items-end gap-4 sm:gap-6 mb-8">
            <div class="flex-1 w-full">
                <label for="name" class="label">Name of the Quize</label>
                <input type="text" wire:model="name" class="form-input">
                @error('name')
                    <div class="text-red-400 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                @include('components.wire-loading-btn', ['label' => 'Create Quiz'])
            </div>
        </div>
    </form>
</div>
