@php
    $color = match($type) {
        'error' => 'text-red-800 bg-red-200',
        'warning' => 'text-yellow-800 bg-yellow-100',
        default => 'text-green-800 bg-green-400',
    };
    $icon = match($type) {
        'error' => 'icon.x-mark',
        'warning' => 'icon.warning',
        default => 'icon.check',
    };
    $classList = "p-2 mb-4 mt-1 rounded-md $color";
@endphp
<div {!! $attributes->merge(['class' => $classList]) !!} role="alert">
    <div class="flex items-center">
        <x-dynamic-component :component="$icon" />

        <div class="pl-4 w-full text-left">
            @if($title)
                <div class="font-bold">{{$title}}</div>
            @endif
            {{$slot}}
        </div>
    </div>
</div>
