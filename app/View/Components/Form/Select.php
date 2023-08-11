<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    use HasChoices;

    public array $choices = [];

    public function __construct(
        public string $label = '',
        public string $id = '',
        public mixed $value = '',
        public string $placeholder = 'Select an Option...',
        public bool $disabled = false,
        array $choices = [],
    ) {
        $this->setChoices([
            [
                'label' => $this->placeholder,
                'selected' => empty($this->value),
                'value' => null,
            ],
            ...$choices,
        ]);
    }

    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
