<div class="p-4">
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">#</th>
                <th class="p-2 border">Class</th>
                <th class="p-2 border">Subject</th>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Code</th>
                <th class="p-2 border">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chapters as $chapter)
                <tr>
                    <td class="border p-2">{{ $loop->iteration }}</td>
                    <td class="border p-2">{{ $chapter->schoolClass->name }}</td>
                    <td class="border p-2">{{ $chapter->subject->name_en }}</td>
                    <td class="border p-2">{{ $chapter->name }}</td>
                    <td class="border p-2">{{ $chapter->code }}</td>
                    <td class="border p-2">
                        <div class="flex items-center justify-center gap-2">
                            <a href="" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                @include('components.icons.edit')
                            </a>
                            <button wire:click="delete({{ $chapter->id }})"
                                wire:confirm="Are you sure you want to delete this?"
                                class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                @include('components.icons.trash')
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
