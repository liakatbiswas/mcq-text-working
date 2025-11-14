<div class="p-4 space-y-4">

    <div class="flex">
        <!-- Class -->
        <div class="w-2/12 p-2">
            <label class="block font-medium mb-1">Class</label>
            <select wire:model.live="school_class_id" class="w-full border-gray-300 rounded">
                <option value="">Select Class</option>
                @foreach ($school_classes as $class)
                    <option value="{{ $class->id }}">{{ ucfirst($class->name) }}</option>
                @endforeach
            </select>
            @error('school_class_id')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Subject -->
        <div class="w-5/12 p-2">
            <label class="block font-medium mb-1">Subject</label>
            <select wire:model.live="subject_id" class="w-full border-gray-300 rounded"
                {{ empty($subjects) ? 'disabled' : '' }}>
                <option value="">Select Subject</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name_en }}</option>
                @endforeach
            </select>
            @error('subject_id')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Chapter -->
        <div class="w-5/12 p-2">
            <label class="block font-medium mb-1">Chapter</label>
            <select wire:model="chapter_id" class="w-full border-gray-300 rounded"
                {{ empty($chapters) ? 'disabled' : '' }}>
                <option value="">Select Chapter</option>
                @foreach ($chapters as $chapter)
                    <option value="{{ $chapter->id }}">{{ $chapter->name }}</option>
                @endforeach
            </select>
            @error('chapter_id')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

    </div>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Ans A</th>
                <th>Ans B</th>
                <th>Ans C</th>
                <th>Ans D</th>
                <th>Answer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ Str::limit($question->name, 60) }}</td>
                    <td>{{ $question->ans_a }}</td>
                    <td>{{ $question->ans_b }}</td>
                    <td>{{ $question->ans_c }}</td>
                    <td>{{ $question->ans_d }}</td>
                    <td>
                        <div class="bg-red-200 inline-block py-1 px-2 rounded-lg">{{ $question->correct_ans }}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $questions->links() }}
    </div>

</div>
