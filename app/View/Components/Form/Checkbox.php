<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    public function __construct(
        public string $label,
        public string $id,
        public string $value = '',
        public bool $checked = false,
        public bool $disabled = false,
    ) {
    }

    public function render(): View|Closure|string
    {
        $inputClass = 'w-4 h-4 rounded focus:ring-blue-500';
        if ($this->disabled) {
            $inputClass .= ' text-gray-100 bg-white border-gray-200';
        } else {
            $inputClass .= ' text-blue-600 bg-gray-250 border-gray-400';
        }

        $labelClass = 'ml-2 pt-2';
        if ($this->disabled) {
            $labelClass .= ' opacity-25	';
        }

        return view('components.form.checkbox', compact('inputClass', 'labelClass'));
    }
}
