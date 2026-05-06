@extends('layouts.app')

@section('content')

<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">
        Laravel WireSpy Demo Dashboard
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Counter --}}
        <div>
            @livewire('counter')
        </div>

        {{-- Todo Manager --}}
        <div>
            @livewire('todo-manager')
        </div>

    </div>
</div>

@endsection