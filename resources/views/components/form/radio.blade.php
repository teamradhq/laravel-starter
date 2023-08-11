<x-form.control class="flex items-center mb-4 ml-1 mr-4">
    <input
        {{$attributes->merge(['class' => $inputClass])}}
        id="{{$id}}"
        type="radio"
        value="{{$value}}"
        name="{{$name}}"
        @if($checked) checked @endif
        @if($disabled) disabled @endif
    >
    <x-input-label :for="$id" :value="$label" :class="$labelClass"/>
</x-form.control>
