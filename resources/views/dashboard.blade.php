@extends('layouts.app')

@section('content')

<div class="p-2 md:p-6 transition-all">
    {{-- Header Section --}}
    <div class="mb-8 border-b dark:border-slate-700 pb-6">
        <h1 class="text-3xl font-extrabold text-slate-800 dark:text-white tracking-tight">
            Laravel WireSpy Dashboard
        </h1>
        <p class="text-slate-500 dark:text-slate-400 mt-2">
            Real-time Livewire component monitoring & management
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        {{-- Counter Card --}}
        <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-lg border border-slate-100 dark:border-slate-700 hover:shadow-xl transition-all">
            <h3 class="text-sm font-bold text-blue-500 uppercase tracking-widest mb-4">Live Counter</h3>
            @livewire('counter')
        </div>

        {{-- Todo Manager Card --}}
        <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-lg border border-slate-100 dark:border-slate-700 hover:shadow-xl transition-all">
            <h3 class="text-sm font-bold text-emerald-500 uppercase tracking-widest mb-4">Task Manager</h3>
            @livewire('todo-manager')
        </div>

    </div>

    {{-- Wire-Spy Instruction Footer --}}
    <div class="mt-10 p-6 bg-blue-50 dark:bg-blue-900/20 rounded-2xl border border-blue-100 dark:border-blue-800 text-center">
        <p class="text-blue-800 dark:text-blue-300 font-medium">
            💡 Press <kbd class="bg-white dark:bg-slate-800 px-2 py-1 rounded border dark:border-slate-600 font-mono text-xs">Cmd/Ctrl + I</kbd> to open the WireSpy inspector!
        </p>
    </div>
</div>

@endsection