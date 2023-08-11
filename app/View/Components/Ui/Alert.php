<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public function __construct(public string $type = 'success', public string $title = '')
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.ui.alert');
    }
}
