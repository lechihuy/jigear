@props([
    'value' => null
])

@if ($value)
    <span 
        class="inline-block p-1 font-mono text-sm text-red-800 bg-red-100 rounded-lg cursor-pointer select-none" 
        {{ $attributes }}
        x-data
        @dblclick="function($event) {
            navigator.clipboard.writeText($event.target.textContent)
            Alpine.store('toast').show('success', '{{ __('Đã được lưu trong clipboard!') }}')
        }"
    >{{ $value }}</span>
@else
    &mdash;
@endif
