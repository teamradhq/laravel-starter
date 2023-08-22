<?php

namespace App\Services;

use App\Exceptions\ApplicationException;

class TailwindAttributes
{
    public static array $colors = [
        'slate',
        'gray',
        'zinc',
        'neutral',
        'stone',
        'red',
        'orange',
        'amber',
        'yellow',
        'lime',
        'green',
        'emerald',
        'teal',
        'cyan',
        'sky',
        'blue',
        'indigo',
        'violet',
        'purple',
        'fuchsia',
        'pink',
        'rose',
    ];

    public static array $shades = [
        50,
        100,
        200,
        300,
        400,
        500,
        600,
        700,
        800,
        900,
        950,
    ];

    /**
     * @throws ApplicationException
     */
    public static function colorGuard(string $color, int $shade): void
    {
        static::guard(
            in_array($color, self::$colors, true),
            "Color {$color} is not a valid Tailwind color.",
        );
        static::guard(
            in_array($shade, self::$shades, true),
            "Shade {$shade} is not a valid Tailwind color shade.",
        );
    }

    /**
     * @throws ApplicationException
     */
    private static function guard(bool $result, string $message): void
    {
        if (!$result) {
            throw new ApplicationException($message);
        }
    }
}
