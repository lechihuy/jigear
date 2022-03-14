@props([
    'value'
])

<td class="p-3 text-gray-900 whitespace-nowrap {{ $attributes->get('class') }}">
    @if ($value)
        <span class="inline-block py-0.5 px-2 font-mono text-sm text-red-800 bg-red-100 rounded-lg">{{ $value }}</span>
    @else
        &mdash;
    @endif
</td>
