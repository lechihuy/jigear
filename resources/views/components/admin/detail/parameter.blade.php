@props([
    'value' => []
])

@if (count($value))
    <table class="table w-full">
        @foreach ($value as $key => $parameter)
            <tr @if ($key % 2 == 0) class="bg-gray-50" @endif>
                <td class="px-3 py-2 font-semibold">{{ $parameter->key }}</td>
                <td class="px-2 py-2">{{ $parameter->value }}</td>
            </tr>
        @endforeach
    </table>
@else
    &mdash;
@endif
