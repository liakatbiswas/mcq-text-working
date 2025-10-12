<div class="space-y-4">
    <form wire:submit.prevent="save">
        <div>
            <label class="block mb-1">Class</label>
            <select wire:model.lazy="school_class_id" class="border rounded p-2 w-full">
                <option value="">Select Class</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
            @error('school_class_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Subject Select (depends on class) --}}
        <div>
            <label class="block mb-1">Subject</label>
            <select wire:model="subject_id" class="border rounded p-2 w-full">
                <option value="">Select Subject</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name_en }}</option>
                @endforeach
            </select>
            @error('subject_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Chapter Name --}}
        <div>
            <label class="block mb-1">Chapter Name</label>
            <input wire:model="name" type="text" class="border rounded p-2 w-full">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block mb-1">Code</label>
            <input wire:model="code" type="text" class="border rounded p-2 w-full">
        </div>

        <div>
            <label class="block mb-1">Description</label>
            <textarea wire:model="description" class="border rounded p-2 w-full"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
