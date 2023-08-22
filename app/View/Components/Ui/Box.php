<?php

namespace App\View\Components\Ui;

use App\Exceptions\ApplicationException;
use App\View\Components\Traits\HasColor;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Box extends Component
{
    use HasColor;

    public string $classList = '';

    /**
     * @throws ApplicationException
     */
    public function __construct(public string $color = 'gray', public int $shade = 300)
    {
        $this->setClassList([
            'container',
            'mx-auto',
            'p-4',
            'rounded-md',
            'mb-4',
            $this->bgColor($this->color, $this->shade),
        ]);
    }

    public function render(): View|Closure|string
    {
        return <<<'blade'
            <div {{ $attributes->merge(['class' => $classList]) }}>
                {{ $slot }}
            </div>
        blade;
    }

    private function setClassList(array $classList): void
    {
        $this->classList = implode(' ', $classList);
    }
}
