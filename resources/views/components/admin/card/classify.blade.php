@props([
    'route',
    'label',
])

@php
    $componentId = str_replace('-', '', Str::uuid());
@endphp

<div class="p-5 bg-white rounded-lg shadow" x-data="counterCard{{ $componentId }}">
    <div class="flex items-center">
        <span class="text-sm font-semibold text-gray-700">{{ __($label) }}</span>
    </div>

    <div class="my-3">
        <div x-cloak x-show="!loading" class="flex flex-col gap-2">
            <template x-for="label in labels" :key="label.name">
                <div class="flex items-center w-full gap-2">
                    <div class="w-5 h-5 rounded" :class="label.class"></div>
                    <div class="text-sm">
                        <span x-text="label.counter" class="font-semibold"></span>
                        <span x-text="label.name"></span>
                    </div>
                </div>
            </template>
        </div>
        <div x-cloak x-show="loading" class="rounded h-18 animate-pulse bg-slate-100"></div>
    </div>
    
</div>

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('counterCard{{ $componentId }}', () => ({
        labels: [],
        loading: false,
        init() {
            this.fetch()
        },
        fetch() {
            this.loading = true
            
            axios.get(route('{{ $route }}'))
            .then(res => {
                const data = res.data
                this.labels = data.labels
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