@php
    if ($disabled) {
        $border = 'border-gray-300';
        $text = 'text-gray-900 opacity-50';
    } else if ($errors) {
        $border = 'border-red-500';
        $text = 'text-red-600';
    } elseif ($success) {
        $border = 'border-green-700';
        $text = 'text-green-900';
    } else {
        $border = 'border-gray-500';
        $text = 'text-gray-300';
    }

    if ($hideLabel ?? false) {
        $text = ' sr-only';
    }
@endphp
<x-form.control>
    <x-input-label :for="$id" :value="$label" :class="$text"/>
    <x-text-input
        class="{{$border}} mt-1 block w-full"
        :id="$id"
        :disabled="$disabled"
        :placeholder="$placeholder ?? $label"
        :type="$type"
        {{$attributes->except(['class'])}}
    />
    @if($errors)
        <x-ui.alert type="error" class="mt-2">
            @foreach($errors as $error)
                {{$error}}
            @endforeach
        </x-ui.alert>
    @endif
</x-form.control>
