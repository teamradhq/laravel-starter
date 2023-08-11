<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory as FactoryContract;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Foundation\Application;
use Illuminate\View\Component;

class WrapperLayout extends Component
{

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): ApplicationContract|FactoryContract|ViewContract|Application
    {
        return view('layouts.wrapper');
    }
}
