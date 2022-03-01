@props([
    'value' => null
])

@if ($value)
    <span class="inline-block p-1 font-mono text-sm text-red-800 bg-red-100 rounded-lg" {{ $attributes }}>{{ $value }}</span>
@else
    &mdash;
@endif
