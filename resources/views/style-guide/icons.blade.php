<x-style.example>
    <x-slot:title>Icons</x-slot:title>
    <x-slot:template>style-guide.icons</x-slot:template>

    @php
        $iconDir = base_path('resources/views/components/icon');
        $icons = collect(scandir($iconDir))
            ->filter(fn ($icon) => Str::endsWith($icon, '.blade.php') && !Str::contains($icon, 'base') )
            ->map(fn ($icon) => Str::replace('.blade.php', '', $icon));
    @endphp

    <x-ui.grid cols="9">

        @foreach($icons as $icon)
            @php($component = "icon.$icon")
            <div class="flex flex-col items-center">
                <x-dynamic-component :component="$component" class="w-12 h-12" />
                <code class="mt-2 text-xs text-white">{{$icon}}</code>
            </div>
        @endforeach
        @foreach($icons as $icon)
            @php($component = "icon.$icon")
            <div class="flex flex-col items-center">
                <x-dynamic-component :component="$component" class="w-12 h-12" />
                <code class="mt-2 text-xs text-white">{{$icon}}</code>
            </div>
        @endforeach
    </x-ui.grid>
</x-style.example>
