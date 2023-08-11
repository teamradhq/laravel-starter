@php($classList = Arr::join([
    "bg-gray-50",
    "border",
    "border-gray-500",
    "text-gray-900",
    "rounded-lg",
    "focus:ring-blue-500",
    "focus:border-blue-500",
    "block",
    "w-full",
    "p-2",
], ' '))
<x-form.control>
    <x-input-label for="{{$id}}" value="{{$label}}" class="mb-2"/>
    <select
        {{$attributes->except(['class'])}}
        id="{{$id}}"
        class="{{$classList}}"
        @if($disabled) disabled @endif
    >
        @foreach($choices as $choice)
            <option
                @if($choice['value'] ?? false) value="{{$choice['value']}}" @endif
                @if($choice['selected'] ?? false) selected @endif
            >
                {{$choice['label']}}
            </option>
        @endforeach
    </select>
</x-form.control>
