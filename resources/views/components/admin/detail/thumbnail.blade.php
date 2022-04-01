@props([
    'value' => null
])

@if ($value)
    <img src="{{ $value }}" class="max-w-full border border-gray-300 rounded-lg max-h-40">
@else
    &mdash;
@endif
