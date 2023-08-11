@props([
    'type' => 'success',
    'title' => 'Success',
    'message' => 'Message',
])

<div
    class="fixed top-0 left-0 mx-auto w-full text-center"
    x-data="{show: true}"
    x-show="show"
    x-init="setTimeout(() => show = false, 5000)"
>
    <x-ui.alert class="w-1/2 mx-auto shadow-md" :type="$type" :title="$title">
        {{$slot}}
    </x-ui.alert>
</div>
