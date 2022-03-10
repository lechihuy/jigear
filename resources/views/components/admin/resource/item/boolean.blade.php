@props([
    'value' => false,
])

<td class="p-3 text-center whitespace-nowrap {{ $attributes->get('class') }}">
    @if ($value)
        <span class="text-green-500 material-icons-outlined">check_circle</span>
    @else
        &mdash;
    @endif
</td>
