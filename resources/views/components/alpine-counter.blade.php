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

<div x-data="counter()">
    <div class="{{$classes}} bg-gray-100 dark:bg-gray-900">
        <span x-text="count" />
    </div>
    <button
            class="{{$classes}} bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 hover:dark:bg-gray-600"
            x-on:click="increment()"
    >+
    </button>
    <script>
        function counter() {
            return {
                count: 1,
                increment() {
                    this.count++;
                },
            };
        }
    </script>
</div>
