@props([
    'label',
    'url',
])

<td class="p-3 whitespace-nowrap {{ $attributes->get('class') }}">
    @if ($url)
        <a 
            href="{{ $url }}" 
            class="font-semibold text-sky-500 hover:text-sky-600" 
            {{ $attributes }}
        >
            {{ $label }}
        </a>
    @else
        &mdash;
    @endif
</td>
