<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = 'button',
        public string $context = '',
        public bool $disabled = false,
        public string $href = '',
        public string $size = 'base',
    ) {
        $this->setContext();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.button');
    }

    private function setContext(): void
    {
        if ($this->disabled) {
            $this->context = 'disabled';
        }
    }
}
