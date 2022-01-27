<div>
    <div class="w-full flex pb-10">
        <div class="w-3/6 mx-1">
            <input wire:model.debounce.300ms="searchQuery" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search users...">
        </div>
    </div>
    <table class="table-auto w-full mb-6">
        <thead>
            <tr>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Author</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Content</th>
                {{-- <th class="px-4 py-2">Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td class="border px-4 py-2">{{ $record->title }}</td>
                    <td class="border px-4 py-2">{{ $record->author }}</td>
                    <td class="border px-4 py-2">{{ $record->subject }}</td>
                    <td class="border px-4 py-2">{{ $record->content }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $records->links() !!}
</div>