@props([
    'value',
    'surfix' => null
])

@if ($value !== null)
    <span {{ $attributes->merge(['class' => 'font-mono']) }}>{{ $surfix ?? App\Models\Option::get('currency') }}{{ number_format($value, 0) }}</span>
@else
    &mdash;
@endif
