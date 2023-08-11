<div {!! $attributes->merge([
    'class' => "container mx-auto p-4 bg-gray-200 rounded-md mb-4"
]) !!}>
    {{ $slot }}
</div>
