@props([
    'value'
])

<td class="p-3 text-gray-900 whitespace-nowrap {{ $attributes->get('class') }}">
    {!! $value ?? '&mdash;' !!}
</td>
