<div>
    <div>
        <div class="overflow-x-auto text-[12px]">
            <table class="min-w-full bg-white border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Name</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($quizzes as $quiz)
                        <tr>
                            <td class="px-4 py-2 border">{{ $quiz->id }}</td>
                            <td class="px-4 py-2 border">{{ $quiz->name }} </td>
                            <td class="px-4 py-2 border">
                                <div class="flex items-center justify-end space-x-1">
                                    <a href="{{ route('quizs.show', $quiz->id) }}"
                                        class="px-2 py-1 bg-gray-500 text-white rounded hover:bg-yellow-600">
                                        @include('components.icons.eye')
                                    </a>
                                    <a href="{{ route('quizs.edit', $quiz->id) }}"
                                        class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                        @include('components.icons.edit')
                                    </a>
                                    <button
                                        x-on:click="if(confirm('Are you sure you want to delete this?')){$wire.delete({{ $quiz->id }})}"
                                        type="button" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                        @include('components.icons.trash')
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                                <p class="font-bold text-2xl">No Quiz Found!</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $quizzes->links() }}
        </div>
    </div>

</div>
