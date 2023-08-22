<?php

namespace App\View\Components\Traits;

use App\Exceptions\ApplicationException;
use App\Services\TailwindAttributes;

trait HasColor
{
    /**
     * @throws ApplicationException
     */
    protected function bgColor(string $color = 'gray', int $shade = 300): string
    {
        TailwindAttributes::colorGuard($color, $shade);

        return "bg-{$color}-{$shade}";
    }

    /**
     * @throws ApplicationException
     */
    protected function textColor(string $color = 'gray', int $shade = 300): string
    {
        TailwindAttributes::colorGuard($color, $shade);

        return "text-{$color}-{$shade}";
    }
}
