<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4"> No </th>
                <th scope="col" class="px-6 py-3"> School Name </th>
                <th scope="col" class="px-6 py-3"> Action </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($schools as $school)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        {{ $loop->iteration }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $school->name }}
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <a href="" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                @include('components.icons.edit')
                            </a>
                            <button wire:click="delete({{ $school->id }})"
                                wire:confirm="Are you sure you want to delete this?"
                                class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                @include('components.icons.trash')
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="font-bold text-4xl text-gray-500 text-center py-8" colspan="3">
                        There is no Classes
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
