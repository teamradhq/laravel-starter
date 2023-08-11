<x-wrapper-layout>
    @if(isset($header))
        <x-slot name="header">
            {{ $header }}
        </x-slot>
    @endif

    {{ $slot }}
</x-wrapper-layout>
