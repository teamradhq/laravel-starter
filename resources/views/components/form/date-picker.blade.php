@php($ref = 'dateInput' . Str::replace('-', '',  $id))
<div x-data="{ value: '{{$value}}' }" x-init="flatpickr($refs.{{$ref}}, {
            altInput: true,
            altFormat: '{{$altFormat}}',
            dateFormat: '{{$format}}',
            enableTime: {{$enableTime ? 'true' : 'false' }},
            noCalendar: {{$noCalendar ? 'true' : 'false' }},
        })
  "
     x-effect="flatpickr($refs.{{$ref}}, {
            altInput: true,
            altFormat: '{{$altFormat}}',
            dateFormat: '{{$format}}',
            enableTime: {{$enableTime ? 'true' : 'false' }},
            noCalendar: {{$noCalendar ? 'true' : 'false' }},
        })"
>
    <x-form.input
        type="text"
        :label="$label"
        :id="$id"
        :hide-label="$hideLabel"
        value="{{$value}}"
        placeholder="YYYY-MM-DD"
        :x-ref="$ref"
        {{ $attributes->except(['class'])}}
    />

</div>


