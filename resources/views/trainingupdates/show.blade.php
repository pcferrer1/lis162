{{-- @extends('layouts.app')

@section('content')
    @livewire('test.show', ['rec' => $record])
@endsection --}}

<x-app-layout>
    <div>
        {{-- <h1>Show Page</h1> --}}
        @livewire('test.show', ['rec' => $record])
    </div>
</x-app-layout>



