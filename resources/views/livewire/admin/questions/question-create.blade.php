<div>

    <div class="max-w-6xl mx-auto p-6 bg-white shadow rounded-lg">
        <h2 class="text-xl font-semibold mb-4">Create New Question</h2>

        @if (session()->has('success'))
            <div class="p-3 mb-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">

            <div class="flex">
                {{-- Class --}}
                <div class="w-2/12 p-2">
                    <label class="block font-medium mb-1">Class</label>
                    <select wire:model.live="school_class_id" class="w-full border-gray-300 rounded">
                        <option value="">Select Class</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ ucfirst($class->name) }}</option>
                        @endforeach
                    </select>
                    @error('school_class_id')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Subject --}}
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

                {{-- Chapter --}}
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

            {{-- Optional Passage --}}
            <div>
                <label class="block font-medium mb-1">Passage (optional)</label>
                <select wire:model="passage_id" class="w-full border-gray-300 rounded">
                    <option value="">None</option>
                    @foreach ($passages as $passage)
                        <option value="{{ $passage->id }}">
                            {{ Str::limit($passage->body, 80) }}
                        </option>
                    @endforeach
                </select>
                @error('passage_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Question Text --}}
            <div>
                <label class="block font-medium mb-1">Question</label>
                <textarea wire:model="name" rows="3" class="w-full border-gray-300 rounded"></textarea>
                @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Answers --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label>Answer A</label>
                    <textarea wire:model="ans_a" class="w-full border-gray-300 rounded"></textarea>
                    @error('ans_a')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label>Answer B</label>
                    <textarea wire:model="ans_b" class="w-full border-gray-300 rounded"></textarea>
                    @error('ans_b')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label>Answer C</label>
                    <textarea wire:model="ans_c" class="w-full border-gray-300 rounded"></textarea>
                    @error('ans_c')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label>Answer D</label>
                    <textarea wire:model="ans_d" class="w-full border-gray-300 rounded"></textarea>
                    @error('ans_d')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex">
                {{-- Correct Answer --}}
                <div class="w-1/2 p-2">
                    <label class="block font-medium mb-1">Correct Answer</label>
                    <select wire:model="correct_ans" class="w-full border-gray-300 rounded">
                        <option value="">Select Correct Option</option>
                        <option value="A">Answer A</option>
                        <option value="B">Answer B</option>
                        <option value="C">Answer C</option>
                        <option value="D">Answer D</option>
                    </select>
                    @error('correct_ans')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Difficulty --}}
                <div class="w-1/2 p-2">
                    <label class="block font-medium mb-1">Difficulty</label>
                    <select wire:model="difficulty" class="w-full border-gray-300 rounded">
                        <option value="easy">Easy</option>
                        <option value="medium">Medium</option>
                        <option value="hard">Hard</option>
                    </select>
                    @error('difficulty')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            {{-- Explanation --}}
            <div>
                <label class="block font-medium mb-1">Explanation (optional)</label>
                <textarea wire:model="explanation" rows="2" class="w-full border-gray-300 rounded"></textarea>
            </div>

            {{-- Submit --}}
            <div class="text-right">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Save Question
                </button>
            </div>
        </form>
    </div>

</div>
