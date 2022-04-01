@props([
    'owner',
    'display',
    'prefixRouteName'
])

<td class="p-3 whitespace-nowrap {{ $attributes->get('class') }}">
    @if ($owner)
        <a
            class="font-semibold text-sky-500 hover:text-sky-600"
            href="{{ route($prefixRouteName.'show', $owner) }}" 
            {{ $attributes }}
        >
            {{ $owner->{$display} }}
        </a>
    @else
        &mdash;
    @endif
</td>