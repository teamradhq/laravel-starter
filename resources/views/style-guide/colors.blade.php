@php
    use App\Services\TailwindAttributes;
@endphp
<x-style.example>
    <x-slot:title>Colors</x-slot:title>
    <x-slot:template>style-guide.colors</x-slot:template>
    @foreach (TailwindAttributes::$colors as $color)
        <x-ui.grid cols="12">
            <x-ui.col span="1">
                <x-ui.heading level="4">{{Str::upper($color)}}</x-ui.heading>
            </x-ui.col>
            <x-ui.col span="11">
                <div class="flex items-center justify-between">
                    @foreach (TailwindAttributes::$shades as $shade)
                        @php($class = "$color-{$shade}")
                        @php($bg = $shade < 600 ? 'bg-black' : 'bg-white')
                        <div class="w-24 h-32 flex flex-col items-center justify-center">
                            <div class="border border-white rounded-sm w-16 h-16 bg-{{$class}}"></div>
                            <code class="mt-2 w-20 text-center rounded-sm p-1 text-xs text-{{$class}} {{$bg}}">
                                {{$color}} <br> {{$shade}}
                            </code>
                        </div>
                    @endforeach
                </div>
            </x-ui.col>
        </x-ui.grid>
    @endforeach
</x-style.example>


