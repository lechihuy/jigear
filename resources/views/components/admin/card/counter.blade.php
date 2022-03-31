@props([
    'route',
    'label'
])

@php
    $componentId = str_replace('-', '', Str::uuid());
@endphp

<div class="p-5 bg-white rounded-lg shadow" x-data="counterCard{{ $componentId }}">
    <div class="flex items-center">
        <span class="text-sm font-semibold text-gray-700">{{ __($label) }}</span>
        <select class="w-24 px-2 py-1 ml-auto text-xs form-select" x-model="period" @change="fetch">
            <option value="today">{{ __('Hôm nay') }}</option>
            <option value="this-month">{{ __('Tháng này') }}</option>
            <option value="this-year">{{ __('Năm này') }}</option>
            <option value="all">{{ __('Tất cả') }}</option>
        </select>
    </div>

    <div class="my-3">
        <span x-cloak x-show="!loading" class="text-3xl text-gray-900" x-text="counter"></span>
        <div x-cloak x-show="loading" class="h-8 rounded animate-pulse bg-slate-100"></div>
    </div>

     <div class="flex items-center">
        <p x-cloak x-show="!loading && trend[0] == '+'" class="flex items-center gap-1 text-green-500">
            <span class="material-icons-outlined">trending_up</span> <span x-text="trend[1] + '%'"></span>
        </p>
        <p x-cloak x-show="!loading && trend[0] == '-'" class="flex items-center gap-1 text-red-500">
            <span class="material-icons-outlined">trending_down</span> <span x-text="trend[1] + '%'"></span>
        </p>
        <div x-cloak x-show="loading" class="h-6 rounded animate-pulse bg-slate-100"></div>
    </div>
    
</div>

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('counterCard{{ $componentId }}', () => ({
        counter: null,
        period: 'today',
        trend: null,
        loading: false,
        init() {
            this.fetch()
        },
        fetch() {
            this.loading = true
            
            axios.get(route('{{ $route }}'), { params: {
                period: this.period
            }}).then(res => {
                const data = res.data
                this.counter = data.counter
                this.trend = data.trend
            }).catch(err => {
                Alpine.store('toast').show('danger', 'Try again!')
            }).finally(() => {
                this.loading = false;
            })
        }
    }));
});
</script>
@endpush