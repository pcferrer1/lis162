@extends('layouts.app')

@section('content')
    
    <div class="container py-5">
        {{-- {{ dd($records) }} --}}

        {{-- <x-input />     --}}
        <h1 class="text-center pb-5">Training Updates List</h1>

        <div class="mb-3 row">
            <div class="w-1/4">
                <label class="mr-1">Search Title</label>
                <input wire:model.debounce.300ms="searchQuery" type="text" class="border">
            </div>
        </div>
        {{-- {{ dd($data) }} --}}
        <div class="my-3">
            <button wire:click="$toggle('createModal')" class="btn btn-primary">Add New Record</button>
        </div>

        

        <table id="records" class="table table-light table-hover">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Content</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($records as $record)
                <tr>
                    <td>{{ $record->title }}</td>
                    <td>{{ $record->author }}</td>
                    <td>{{ $record->subject }}</td>
                    <td>{{ $record->content }}</td>
                    <td>{{ $record->created_at->format('m/d/Y') }}</td>
                    <td style="width: auto">
                        <button wire:click="edit({{ $record->id }})" class="btn text-light btn-sm btn-primary mx-2" >Edit</button>
                        <button wire:click="openDeleteModal({{ $record->id }})" class="btn text-light btn-sm btn-danger">Delete</button>
                        <a href="{{ route('trainingupdates.show', ['trainingupdate' => $record->id]) }}" class="btn text-light btn-sm btn-primary">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>

        {{ $records->links() }}

        @if ($createModal)
            @include('livewire.test.create')
        @endif

        @if ($deleteModal)
            @include('livewire.test.delete_modal')
        @endif

    </div>

@endsection
