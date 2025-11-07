<div class="p-4 space-y-4">
    <div>
        <div class="flex flex-wrap gap-4 mb-8">
            <select wire:model.live="school_class_id"
                class="border p-2 rounded w-full bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-100">
                <option value="" class="text-gray-700 dark:text-gray-200">Select Class</option>
                @foreach ($school_classes as $class)
                    <option value="{{ $class->id }}" class="text-gray-800 dark:text-gray-100">
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>

            <select wire:model.live="subject_id"
                class="border p-2 rounded w-full bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-100">
                <option value="" class="text-gray-700 dark:text-gray-200">Select Subject</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" class="text-gray-800 dark:text-gray-100">
                        {{ $subject->name_en }}
                    </option>
                @endforeach
            </select>

            <select wire:model.live="chapter_id"
                class="border p-2 rounded w-full bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-100">
                <option value="" class="text-gray-700 dark:text-gray-200">Select Chapter</option>
                @foreach ($chapters as $chapter)
                    <option value="{{ $chapter->id }}" class="text-gray-800 dark:text-gray-100">
                        {{ $chapter->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <table class="table-auto w-full border">
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
                        <td>{{ Str::limit($question->title, 60) }}</td>
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

</div>
