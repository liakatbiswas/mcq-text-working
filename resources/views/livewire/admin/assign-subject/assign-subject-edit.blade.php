<div class="max-w-xl mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Edit Assigned Subjects</h2>

    <div class="mb-4">
        <label class="block mb-1">Class</label>
        <select wire:model="school_class_id" class="border rounded p-2 w-full">
            <option value="">Select Class</option>
            @foreach ($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
        </select>
        @error('school_class_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block mb-1">Subjects</label>
        <div class="grid grid-cols-2 gap-2">
            @foreach ($subjects as $subject)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" wire:model="selectedSubjects" value="{{ $subject->id }}"
                        class="form-checkbox">
                    <span>{{ $subject->name_en }}</span>
                </label>
            @endforeach
        </div>
        @error('selectedSubjects')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex justify-end">
        <button wire:click="update" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Update
        </button>
    </div>
</div>
