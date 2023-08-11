<x-form.control class="flex items-center mb-4 ml-1">
    <input id="{{$id}}"
           name="{{$id}}"
           value="{{$value ?: $id}}"
           class="{{$inputClass}} opacity"
           type="checkbox"
           @if($checked) checked @endif
           @if($disabled) disabled @endif
    >
    <x-input-label :for="$id" :value="$label" :class="$labelClass"/>
</x-form.control>
