@php
$lightColor = 'text-gray-800'; // : 'text-black';
$darkColor = 'text-white'; //: 'text-gray-800' ;
$classList = "pt-6 mb-4 font-semibold leading-tight $lightColor dark:$darkColor"; //  dark:text-white
@endphp
<div>
    @switch($level)
        @case(1)
            @php $classList .= ' text-3xl'; @endphp @break
        @case(2)
            @php $classList .= ' text-2xl'; @endphp @break
        @case(3)
            @php $classList .= ' text-xl'; @endphp @break
        @case(4)
            @php $classList .= ' text-lg'; @endphp @break
        @case(5)
            @php $classList .= ' text-base'; @endphp @break
        @case(6)
            @php $classList .= ' text-sm'; @endphp @break
        @default
    @endswitch

    <h2 {!! $attributes->merge(['class' => $classList]) !!} >
        {{$slot}}
    </h2>
</div>
