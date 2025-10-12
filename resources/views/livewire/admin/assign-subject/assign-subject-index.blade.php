<div class="p-6">
    <table class="w-full border text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">#</th>
                <th class="border p-2">Class</th>
                <th class="border p-2">Subject</th>
                <th class="border p-2">Subject</th>
                <th class="border p-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assignSubjects as $item)
                <tr>
                    <td class="border p-2 text-center">{{ $loop->iteration }}</td>
                    <td class="border p-2">{{ $item->schoolClass->name }}</td>
                    <td class="border p-2">{{ $item->subject->name_en }}</td>
                    <td class="border p-2">{{ $item->subject->name_bn }}</td>
                    <td class="border p-2 text-center space-x-2">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('assign-subject.edit', $item->schoolClass->id) }}"
                                class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                @include('components.icons.edit')
                            </a>
                            <button wire:click="delete({{ $item->id }})"
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
