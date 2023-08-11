<table {!! $attributes->merge([
    'class' => 'table-auto mb-4 w-full',
]) !!}>
    @if($header ?? false)
        <thead>
            <tr>{{$header}}</tr>
        </thead>
    @endif
    <tbody>{{$slot}}</tbody>
    @if($footer ?? false)
        <tfoot>
            <tr>{{$footer}}</tr>
        </tfoot>
    @endif
    @if ($caption ?? false)
        <caption class="mb-1">{{$caption}}</caption>
    @endif
</table>
