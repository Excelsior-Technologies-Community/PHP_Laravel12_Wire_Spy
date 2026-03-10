<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0; // Add this property

    public function increment()
    {
        $this->count++; // Increment the count
    }

    public function render()
    {
        return view('livewire.counter');
    }
}