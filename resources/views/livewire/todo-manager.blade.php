<div class="max-w-3xl mx-auto bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-2xl transition-all duration-300">

    <div class="mb-6">
        <h2 class="text-3xl font-extrabold text-slate-800 dark:text-white">Todo Manager</h2>
    </div>

    @if (session()->has('success'))
        <div class="bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 p-3 mb-4 rounded-lg border border-green-200 dark:border-green-800 animate-fade-in">
            {{ session('success') }}
        </div>
    @endif

    @error('title')
        <div class="bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 p-3 mb-4 rounded-lg border border-red-200 dark:border-red-800">
            {{ $message }}
        </div>
    @enderror

    <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-6">
        <input type="text" wire:model="title"
            class="md:col-span-2 border p-3 rounded-xl dark:bg-slate-700 dark:border-slate-600 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none"
            placeholder="Enter new task..." />

        <select wire:model="priority" class="border p-3 rounded-xl dark:bg-slate-700 dark:border-slate-600 dark:text-white outline-none">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>

        <button wire:click="addTodo" wire:loading.attr="disabled" wire:target="addTodo"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition shadow-lg disabled:opacity-50">
            <span wire:loading.remove wire:target="addTodo">Add Task</span>
            <span wire:loading wire:target="addTodo">Saving...</span>
        </button>
    </div>

    <input type="text" wire:model.live="search"
        class="border p-3 w-full mb-6 rounded-xl dark:bg-slate-700 dark:border-slate-600 dark:text-white outline-none focus:ring-2 focus:ring-blue-500"
        placeholder="Search tasks..." />

    <ul class="space-y-3">
        @forelse($todos as $todo)
            <li wire:key="todo-{{ $todo->id }}"
                class="flex justify-between items-center p-4 border dark:border-slate-700 rounded-xl bg-slate-50 dark:bg-slate-700 hover:shadow-md transition">

                <div class="flex flex-col cursor-pointer" wire:click="toggle({{ $todo->id }})">
                    <span class="{{ $todo->completed ? 'line-through text-gray-400 dark:text-gray-500' : 'text-slate-800 dark:text-white font-semibold' }}">
                        {{ $todo->title }}
                    </span>
                    <span class="text-[10px] uppercase font-bold tracking-wider text-blue-500 dark:text-blue-400">
                        {{ $todo->priority }} | {{ $todo->status }}
                    </span>
                </div>

                <button wire:click="deleteTodo({{ $todo->id }})"
                    class="bg-red-50 hover:bg-red-100 dark:bg-red-900/20 text-red-500 px-4 py-2 rounded-lg font-bold text-sm transition">
                    Delete
                </button>
            </li>
        @empty
            <li class="text-gray-500 dark:text-gray-400 text-center py-6">No tasks found</li>
        @endforelse
    </ul>

    <div class="mt-6">
        {{ $todos->links() }}
    </div>
</div>