@props([
    'label',
    'counter',
    'period' => 'today',
    'trend' => null
])

@php
    $trendDirection =  substr($trend, 0, 1);
    $trendValue = str_replace($trendDirection, '', $trend);
    $componentId = str_replace(Str::uuid(), '-', '');
@endphp

<div class="p-5 bg-white rounded-lg shadow" x-data="counterCard{{ $componentId }}">
    <div class="flex items-center">
        <span class="text-sm font-semibold text-gray-700">{{ __($label) }}</span>
        <select class="w-24 px-2 py-1 ml-auto text-xs form-select">
            <option value="today">{{ __('Hôm nay') }}</option>
            <option value="this-month">{{ __('Tháng này') }}</option>
            <option value="this-year">{{ __('Năm này') }}</option>
            <option value="all">{{ __('Tất cả') }}</option>
        </select>
    </div>

    <div class="my-3">
        <span class="text-3xl text-gray-900">{{ $counter }}</span>
    </div>

    @if ($trend)
        <div class="flex items-center gap-2">
            @if ($trendDirection == '-')
                <p class="flex text-red-500 items-centergap-2"><span class="material-icons-outlined">trending_down</span> {{ $trendValue }}%</p>
            @else
                <p class="flex items-center gap-2 text-green-500"><span class="material-icons-outlined">trending_up</span> {{ $trendValue }}%</p>
            @endif
        </div>
    @endif
</div>

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('counterCard{{ $componentId }}', () => ({
        label: null,
        counter: null,
        period: 'today',
        trend: null,
        init() {
        }
    }));
});
</script>
@endpush