@props([
    'value'
])

<td class="p-3 text-gray-900 whitespace-nowrap {{ $attributes->get('class') }}">
    @if ($value)
        <span class="font-mono">{{ number_format($value, 0) }}đ</span>
    @else
        &mdash;
    @endif
</td>
