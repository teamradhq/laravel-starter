<?php

namespace App\View\Components\Ui;

use App\Exceptions\ApplicationException;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Heading extends Component
{
    public string $tag;
    public string $classList;

    /**
     * @throws ApplicationException
     */
    public function __construct(public int $level = 2, public bool $isDark = false)
    {
        if ($level < 1 || $level > 6) {
            throw new ApplicationException('Heading level should be between 1 & 6');
        }

        $this->setTag();
        $this->setClassList();
    }

    public function render(): View|Closure|string
    {
        return <<<'blade'
            <{{$tag}} {!! $attributes->merge(['class' => $classList]) !!}>
                {{$slot}}
            </{{$tag}}>
        blade;
    }

    private function setTag(): void
    {
        $this->tag = "h{$this->level}";
    }

    private function setClassList(): void
    {
        $this->classList = Arr::join([
            $this->isDark ? 'text-gray-100 dark:text-white' : 'text-black dark:text-gray-100',
            'pt-4 mb-4 font-semibold leading-tight',
            @match ($this->level) {
                1 => ' text-3xl',
                2 => ' text-2xl',
                3 => ' text-xl',
                4 => ' text-lg',
                5 => ' text-base',
                6 => ' text-sm',
                default => '',
            },
        ], ' ');
    }
}
