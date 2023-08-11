<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    use HasChoices;

    public function __construct(
        public string $name,
        public string $label,
        public string $value = '',
        public array $choices = [],
        public bool $disabled = false,
        public bool $isColumn = false,
    ) {
        $this->setChoices($choices);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.radio-group');
    }
}
