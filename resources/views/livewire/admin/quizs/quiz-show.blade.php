<div class="p-6">
    <h2 class="text-2xl font-bold mb-6">{{ $quiz->name }}</h2>
    {{-- Show Total Score --}}
    @if ($showScore)
        @php
            $total = count($quiz->questions);
            $correct = count(array_filter($results, fn($r) => $r === 'correct'));
        @endphp
        <span> You got {{ $correct }} out of {{ $total }} correct.</span>
    @endif

    @foreach ($quiz->questions as $question)
        @php
            $status = $results[$question->id] ?? null;
            $selected = $answers[$question->id] ?? null;
        @endphp

        <div
            class="mb-6 border rounded-lg p-4
            @if ($status === 'correct') border-green-500 bg-green-50
            @elseif($status === 'wrong') border-red-500 bg-red-50
            @else border-gray-200 bg-white @endif">

            <h4 class="font-bold mb-3 text-lg">{{ $loop->iteration }}. {{ $question->name }}</h4>

            <div class="flex flex-col space-y-2">
                @foreach (['a', 'b', 'c', 'd'] as $opt)
                    @php
                        $value = $question->{'ans_' . $opt};
                        $isSelected = $selected === $value;
                        $isCorrect = $status === 'correct' && $isSelected;
                        $isWrong = $status === 'wrong' && $isSelected;
                    @endphp

                    <label for="ans_{{ $opt }}_{{ $question->id }}"
                        class="flex items-center space-x-2 p-2 rounded-md cursor-pointer border
                        @if ($isCorrect) border-green-600 bg-green-100 text-green-800
                        @elseif($isWrong) border-red-600 bg-red-100 text-red-800
                        @else border-gray-300 hover:bg-gray-50 @endif">

                        <input type="radio" id="ans_{{ $opt }}_{{ $question->id }}"
                            wire:model="answers.{{ $question->id }}" value="{{ $value }}"
                            wire:change="checkAns({{ $question->id }})">
                        <span>{{ $value }}</span>
                    </label>
                @endforeach
            </div>

            @if ($status)
                <div class="mt-2 font-semibold text-sm">
                    @if ($status === 'correct')
                        ✅ Correct Answer!
                    @else
                        ❌ Wrong Answer! (Correct: {{ $question->{$question->correct_ans} }})
                    @endif
                </div>
            @endif
        </div>
    @endforeach

    {{-- Submit Button --}}
    @if (!$showScore)
        <button class="px-4 py-2 bg-blue-600 text-white rounded" wire:click="submitQuiz">
            Submit Quiz
        </button>
    @endif
</div>
