<x-style.example>
    <x-slot:title>Headings</x-slot:title>
    <x-slot:template>style-guide.headings</x-slot:template>

    @foreach(range(1, 6) as $level)
        <x-ui.heading :level="$level">Heading {{$level}}</x-ui.heading>
    @endforeach

</x-style.example>
