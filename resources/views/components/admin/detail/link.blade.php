@props([
    'label',
    'url',
])

@if ($url)
    <a href="{{ $url }}" {{ $attributes }}>{{ $label }}</a>
@else
    &mdash;
@endif