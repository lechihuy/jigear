@props([
    'value' => null
])

@if ($value)
    <span {{ $attributes }}>{{ $value }}</span>
@else
    &mdash;
@endif
