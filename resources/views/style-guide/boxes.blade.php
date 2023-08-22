@php
    use App\Services\TailwindAttributes;
@endphp
<x-style.example>
    <x-slot:title>Boxes</x-slot:title>
    <x-slot:template>style-guide.boxes</x-slot:template>

    <x-ui.heading level="3">Box sizes</x-ui.heading>
    @php($widths = [
        'One Quarter' => 'w-1/4',
        'One Third' => 'w-1/3',
        'Half' => 'w-1/2',
        'Two Thirds' => 'w-2/3',
        'Three Quarters' => 'w-3/4',
        'Full width' => 'w-full',
    ])
    @foreach($widths as $label => $class)
        <x-ui.box color="gray" shade="200" class="{{$class}} text-black">{{$label}}</x-ui.box>
    @endforeach

    <x-ui.heading level="3">Colored boxes</x-ui.heading>
    @php($classes = 'h-32 flex items-center justify-center text-center')
    @foreach(TailwindAttributes::$colors as $color)
        <x-ui.grid cols="4">
            <x-ui.box :color="$color" shade="100" class="{{$classes}} text-black">{{$color}}-100</x-ui.box>
            <x-ui.box :color="$color" shade="300" class="{{$classes}} text-black">{{$color}}-300</x-ui.box>
            <x-ui.box :color="$color" shade="600" class="{{$classes}} text-white">{{$color}}-600</x-ui.box>
            <x-ui.box :color="$color" shade="900" class="{{$classes}} text-white">{{$color}}-900</x-ui.box>
        </x-ui.grid>
    @endforeach
</x-style.example>
