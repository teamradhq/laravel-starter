@php
    $colName = @match($cols) {
        2 => 'grid-cols-2',
        3 => 'grid-cols-3',
        4 => 'grid-cols-4',
        5 => 'grid-cols-5',
        6 => 'grid-cols-6',
        7 => 'grid-cols-7',
        8 => 'grid-cols-8',
        9 => 'grid-cols-9',
        10 => 'grid-cols-10',
        12 => 'grid-cols-12',
        default => '',
    };
    $gapClass = @match($gap) {
        2 => 'gap-2',
        4 => 'gap-4',
        6 => 'gap-6',
        8 => 'gap-8',
        10 => 'gap-10',
        12 => 'gap-12',
        default => '',
    };

    $classList = "grid $colName $gapClass w-full my-$gap";
@endphp
<div {!! $attributes->merge(['class' => $classList]) !!}>
    {{$slot}}
</div>
