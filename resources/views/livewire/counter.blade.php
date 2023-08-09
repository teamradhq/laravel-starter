@php
    $classes = Arr::join([
        'mx-auto',
        'my-4',
        'overflow-hidden',
        'shadow-sm',
        'sm:rounded-lg',
        'text-lg',
        'text-center',
        'w-12',
        'h-12',
        'flex',
        'items-center',
        'justify-center',
    ], ' ');
@endphp

<div>
    <div class="{{$classes}} bg-gray-100 dark:bg-gray-900">
        {{$count}}
    </div>
    <button
        class="{{$classes}} bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 hover:dark:bg-gray-600"
        wire:click="increment"
    >+</button>
</div>
