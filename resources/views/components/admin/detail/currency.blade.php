@props([
    'value',
    'surfix' => null
])

@if ($value)
    <span class="font-mono" {{ $attributes }}>{{ $surfix ?? App\Models\Option::get('currency') }}{{ number_format($value, 0) }}</span>
@else
    &mdash;
@endif
