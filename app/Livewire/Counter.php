<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0; // Add this property

   public function increment()
{
    $this->count++;

    session()->flash('success', 'Counter incremented successfully!');
}

    public function render()
    {
        return view('livewire.counter');
    }

    
}