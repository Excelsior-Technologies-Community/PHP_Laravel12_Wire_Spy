<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">

    <h2 class="text-2xl font-bold mb-4">Todo Manager</h2>

    {{-- Success Message --}}
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Add Todo --}}
    <div class="flex gap-2 mb-4">
        <input type="text" wire:model="title"
            class="border p-2 w-full rounded"
            placeholder="Enter todo..." />

        <button wire:click="addTodo"
            class="bg-blue-500 text-white px-4 rounded">
            Add
        </button>
    </div>

    {{-- Search --}}
    <input type="text" wire:model.live="search"
        class="border p-2 w-full mb-4 rounded"
        placeholder="Search todo..." />

    {{-- Todo List --}}
   <ul>
    @forelse($todos as $todo)
        <li wire:key="todo-{{ $todo->id }}" 
            class="flex justify-between items-center p-2 border-b">

            <span
                class="{{ $todo->completed ? 'line-through text-gray-500' : '' }}"
                wire:click="toggle({{ $todo->id }})"
                style="cursor:pointer;">
                {{ $todo->title }}
            </span>

            <button wire:click="deleteTodo({{ $todo->id }})"
                class="text-red-500">
                Delete
            </button>

        </li>
    @empty
        <li class="text-gray-500">No todos found</li>
    @endforelse
</ul>

    <div class="mt-4">
        {{ $todos->links() }}
    </div>
</div>