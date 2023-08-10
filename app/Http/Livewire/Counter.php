<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory as FactoryContract;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Counter extends Component
{
    public int $count = 1;

    public function render(): ApplicationContract|FactoryContract|ViewContract|Application
    {
        return view('livewire.counter');
    }

    public function increment(): void
    {
        $this->count++;
    }
}
