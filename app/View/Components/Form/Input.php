<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class Input extends Component
{
    public function __construct(
        public string $id,
        public string $label,
        public array|ViewErrorBag $errors = [],
        public bool $success = false,
        public bool $disabled = false,
        public bool $hideLabel = false,
        public string $type = 'text',
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
