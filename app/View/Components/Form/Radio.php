<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Radio extends Component
{
    public string $id;

    public function __construct(
        public string $label,
        public string $name,
        public string $value = '',
        public int $order = 0,
        public bool $checked = false,
        public bool $disabled = false,
    ) {
        $this->id = "$this->name[$this->order]";
    }

    public function render(): View|Closure|string
    {
        $inputClass = 'w-3.5 h-3.5 focus:ring-blue-500';
        if ($this->disabled) {
            $inputClass .= ' text-gray-400 bg-white border-gray-100 ';
        } else {
            $inputClass .= ' text-blue-600 bg-gray-100 border-gray-300 ';
        }

        $labelClass = 'ml-2 pt-2';

        if ($this->disabled) {
            $labelClass .= ' opacity-50';
        }

        return view('components.form.radio', compact('inputClass', 'labelClass'));
    }
}
