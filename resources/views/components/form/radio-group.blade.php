@php
    $containerClassList = $isColumn ? '' : 'flex flex-row flex-wrap';
    $gridCols = $label ? 5 : 1;
@endphp
<x-ui.grid :cols="$gridCols">
    @if($label)
        <x-ui.col span="1" class="flex items-center">
            <x-input-label class="pb-2 font-semibold">{{$label}}</x-input-label>
        </x-ui.col>
    @endif
    <x-ui.col span="5" :class="$containerClassList">
        @foreach($choices as $i => $choice)
            <x-form.radio
                {{$attributes->except(['class'])}}
                :name="$name"
                :label="$choice['label']"
                :value="$choice['value']"
                :order="$i"
                :checked="$choice['selected']"
                :disabled="$disabled"
            />
        @endforeach
    </x-ui.col>
</x-ui.grid>


