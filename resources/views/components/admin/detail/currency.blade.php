@props([
    'value' => null
])

@if ($value)
    <span class="font-mono" {{ $attributes }}>{{ number_format($value, 0) }}đ</span>
@else
    &mdash;
@endif
