@props([
    'value',
    'surfix' => null
])

@if ($value)
    <span class="font-mono" {{ $attributes }}>{{ number_format($value, 0) }}{{ $surfix ?? 'đ' }}</span>
@else
    &mdash;
@endif
