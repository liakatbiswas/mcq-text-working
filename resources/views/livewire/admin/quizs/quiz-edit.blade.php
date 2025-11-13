<div>
    <!-- add a question -->
    @if (count($questions) > 0)
        <h2 class="font-bold mb-2">Add Question</h2>
        <form wire:submit.prevent="addQuestion">
            <div class="mb-4">
                <label for="name" id="question_id" class="lms-label">Question</label>
                <select wire:model.lazy="question_id" id="question_id" class="lms-input">
                    <option>Select a question</option>
                    @foreach ($questions as $question)
                        <option value="{{ $question->id }}">{{ $question->name }}</option>
                    @endforeach
                </select>

                @error('question_id')
                    <span class="text-red-400 text-sm mt-1">{{ $message }}</span>
                @enderror

            </div>
            @include('components.wire-loading-btn')
        </form>
    @else
        <h2 class="text-2xl text-gray-700 text-center font-bold">No question available</h2>
    @endif

    <!-- show question list -->
    <h2 class="font-bold mb-2">Questions</h2>
    <div class="overflow-x-auto text-[12px]">
        <table class="min-w-full bg-white border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Questin No</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($quiz->questions as $question)
                    <tr>
                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border">{{ $question->id }}</td>
                        <td class="px-4 py-2 border">{{ $question->name }}</td>
                        <td class="px-4 py-2 border text-center">
                            <button wire:click="removeQuestion({{ $question->id }})"
                                wire:confirm="Are you sure you want to remove this question?"
                                class="px-1 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                @include('components.icons.trash')
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                            <p class="font-bold text-2xl">No Question Set Yet!</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
