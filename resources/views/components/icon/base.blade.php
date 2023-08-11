@php
    $classList = ['ui icon inline-block'];
    $provided = $attributes->get('class');

    if ($provided && !Str::contains($provided, 'w-')) {
        $classList[] = 'w-6';
    }

    if ($provided && !Str::contains($provided, 'h-')) {
        $classList[] = 'h-6';
    }

    $classList = Arr::join($classList, ' ');
@endphp

<span {!! $attributes->merge(['class' => $classList]) !!}>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
    >
        {{$slot}}
    </svg>
</span>
