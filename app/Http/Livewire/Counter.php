<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public int $count = 1;

    public function render()
    {
        return view('livewire.counter');
    }

    public function increment(): void
    {
        $this->count++;
    }
}
