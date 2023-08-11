<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Col extends Component
{
    public function __construct(public int $span = 1)
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.ui.col');
    }
}
