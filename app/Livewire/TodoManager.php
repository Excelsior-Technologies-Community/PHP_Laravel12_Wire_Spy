<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Todo;

class TodoManager extends Component
{
    use WithPagination;

    public $title;
    public $search = '';

    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'title' => 'required|min:3'
    ];

    // Reset pagination when searching
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function addTodo()
    {
        $this->validate();

        Todo::create([
            'title' => $this->title
        ]);

        $this->reset('title');

        session()->flash('success', 'Todo added successfully!');
    }

    public function toggle($id)
    {
        $todo = Todo::find($id);

        if ($todo) {
            $todo->completed = !$todo->completed;
            $todo->save();
        }
    }

    public function deleteTodo($id)
{
    $todo = Todo::find($id);

    if ($todo) {
        $todo->delete();
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