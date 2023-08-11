@php
    $colors = [
        'Slate',
        'Gray',
        'Zinc',
        'Neutral',
        'Stone',
        'Red',
        'Orange',
        'Amber',
        'Yellow',
        'Lime',
        'Green',
        'Emerald',
        'Teal',
        'Cyan',
        'Sky',
        'Blue',
        'Indigo',
        'Violet',
        'Purple',
        'Fuchsia',
        'Pink',
        'Rose',
    ];

    $shades = [
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
@endphp

<x-style.example>
    <x-slot:title>Colors</x-slot:title>
    <x-slot:template>style-guide.colors</x-slot:template>

    @foreach ($colors as $color)
        <x-ui.grid cols="12">
            <x-ui.col span="1">
                <x-ui.heading level="4">{{$color}}</x-ui.heading>
            </x-ui.col>
            <x-ui.col span="11">
                <div class="flex items-center justify-between">
                    @foreach ($shades as $shade)
                        @php($class = strtolower($color) . "-{$shade}")
                        <div class="w-24 h-32 flex flex-col items-center justify-center">
                            <div class="border border-white rounded-sm w-16 h-16 bg-{{$class}}"></div>
                            <code class="mt-2 text-xs">
                                bg-{{$class}}
                            </code>
                        </div>
                    @endforeach
                </div>
            </x-ui.col>
        </x-ui.grid>
    @endforeach

</x-style.example>


