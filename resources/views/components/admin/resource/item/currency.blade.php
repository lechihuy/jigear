@props([
    'value',
    'surfix'
])

<td class="p-3 text-gray-900 whitespace-nowrap {{ $attributes->get('class') }}">
    @if ($value !== null)
        <span class="font-mono">{{ $surfix ?? option('currency') }}{{ number_format($value, 0) }}</span>
    @else
        &mdash;
    @endif
</td>
