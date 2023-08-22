<x-app-layout>
    <x-slot:header>
        <x-ui.heading level="1">
            Style Guide
        </x-ui.heading>
    </x-slot:header>

    @include('style-guide.headings')
    @include('style-guide.icons')
    @include('style-guide.colors')
    @include('style-guide.boxes')
</x-app-layout>
