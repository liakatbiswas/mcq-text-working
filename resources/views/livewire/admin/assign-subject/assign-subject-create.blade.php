<div class="p-6 mx-auto">
    <form wire:submit.prevent="save" class="space-y-4">
        <div class="p-6 max-w-lg mx-auto">
            <label class="block mb-1">Assign New Subject</label>
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

        <div>
            <label class="block mb-2">Select subjects for class
                @if ($school_class_id)
                    @php
                        $assignSubject = \App\Models\AssignSubject::find($school_class_id);
                    @endphp

                    @if ($assignSubject)
                        {{ $assignSubject->schoolClass->name }}
                    @endif
                @endif
            </label>
            <div class="flex flex-wrap">
                @foreach ($subjects->chunk(ceil($subjects->count() / 3)) as $chunk)
                    <div class="flex-3 min-w-[300px]">
                        @foreach ($chunk as $subject)
                            <label class="flex items-center space-x-2 mb-2">
                                <input type="checkbox" wire:model="selectedSubjects" value="{{ $subject->id }}">
                                <span>{{ $subject->name_en }}</span>
                            </label>
                        @endforeach
                    </div>
                @endforeach
            </div>
            @error('selectedSubjects')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn-primary"> Assign Subjects </button>
    </form>
</div>
