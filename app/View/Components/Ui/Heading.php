<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Heading extends Component
{
    public function __construct(public int $level = 2, public bool $isDark = false)
    {
        dd('Heading');
    }

    public function render(): View|Closure|string
    {
        return view('components.ui.heading');
    }
}
