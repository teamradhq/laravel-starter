@php
    $colors = match($context ?? null) {
        'success' => 'bg-green-600 hover:bg-green-500 focus:bg-green-500 ',
        'error' => 'bg-red-600 hover:bg-red-500 focus:bg-red-500',
        'disabled' => 'bg-slate-400 hover:bg-slate-500 focus:bg-slate-500',
        default => 'bg-gray-600 hover:bg-gray-600 focus:bg-gray-600',
    };
    $sizing = match($size) {
        'xs' =>  'text-xs p-0 mb-1 ml-1 h-2 w-auto',
        default => 'text-xs mb-1',
    };
    $classList = Arr::join([
        $sizing,
        'text-xs',
        'mb-2',
        'px-2',
        'py-2',
        'inline-flex',
        'items-center',
        'justify-center',
        'bg-gray-800',
        'border',
        'border-transparent',
        'rounded-md',
        'font-semibold',
        'text-white',
        'uppercase',
        'tracking-widest',
        'hover:bg-gray-700',
        'focus:bg-gray-700',
        'active:bg-gray-900',
        'focus:outline-none',
        'focus:ring-2',
        'focus:ring-indigo-500',
        'focus:ring-offset-2',
        'transition',
        'ease-in-out duration-150',
        $colors,
    ], ' ');
    $isLink = $type === 'link';
    $tag = $isLink ? 'a' : 'button';
    $attributeBag = $attributes->merge([
        'class' => $classList,
        'type'=>$type,
        'role'=>'button',
    ]);
@endphp
<{{$tag}} {{ $attributeBag }} @if($disabled) disabled @endif @if($isLink) href="{{$href}}"@endif>
    {{ $slot }}
</{{$tag}}>

