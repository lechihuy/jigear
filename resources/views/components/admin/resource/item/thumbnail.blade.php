@props([
    'value'
])

<td class="w-20 p-3 text-center text-gray-900 whitespace-nowrap">
    <div class="flex items-center justify-center w-full">
        @if ($value)
            <img src="{{ $value }}" class="object-cover border border-gray-300 rounded-lg h-14 w-14">
        @else
            &mdash;
        @endif
    </div>
</td>
