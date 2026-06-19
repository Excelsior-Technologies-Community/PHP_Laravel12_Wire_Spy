<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Todo;
use Illuminate\Support\Facades\Log;

class TodoManager extends Component
{
    use WithPagination;

    public $title;
    public $search = '';
    public $priority = 'medium';
    public $status = 'pending';

    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'title' => 'required|min:3',
        'priority' => 'required',
        'status' => 'required'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function addTodo()
    {
        $this->validate();

        Todo::create([
            'title' => $this->title,
            'priority' => $this->priority,
            'status' => $this->status,
            'completed' => false,
        ]);

        Log::info('New Todo Added: ' . $this->title . ' [Priority: ' . $this->priority . ']');

        $this->reset(['title', 'priority', 'status']);

        session()->flash('success', 'Todo added successfully!');
    }

    public function toggle($id)
    {
        $todo = Todo::find($id);

        if ($todo) {
            $todo->completed = !$todo->completed;
            $todo->save();
            Log::info('Todo Toggled: ' . $todo->title);
        }
    }

    public function deleteTodo($id)
    {
        $todo = Todo::find($id);

        if ($todo) {
            $todo->delete();
            Log::warning('Todo Deleted: ' . $todo->title);
            session()->flash('success', 'Todo deleted successfully!');
        }
    }

    public function render()
    {
        $todos = Todo::where('title', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(5);

        return view('livewire.todo-manager', compact('todos'));
    }
}