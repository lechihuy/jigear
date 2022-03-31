@props([
    'source' => [],
])

@php
    $componentId = str_replace('-', '', Str::uuid());
    $sets = \App\Models\ProductParameterSet::all();
@endphp

<div class="w-full" x-data="parameterFormControl{{ $componentId }}">
    {{-- Source --}}
    <p class="mb-2 text-sm text-gray-700">{{ __('Chọn từ bộ có sẵn') }}</p>
    <select class="form-select" @change="loadParameterSet">
        <option value="[]">&mdash;</option>
        @foreach ($sets as $set)
            <option value="{{ $set->parameters->pluck('key')->toJson() }}">{{ $set->key }}</option>
        @endforeach
    </select>

    {{-- Key-value form control --}}
    <div class="mt-5">
        <table class="table w-full">
            <template x-for="(parameter, index) in {{ $attributes->get('x-model') }}" :key="index">
                <tr>
                    <td>
                        <input type="text" class="font-semibold bg-gray-50 form-text" x-model="parameter.key">
                    </td>
                    <td>
                        <input type="text" class="form-text" x-model="parameter.value">
                    </td>
                    <td class="w-12">
                        <button type="button" class="btn btn-light" tabindex="-1" @click="removeParameter(index)">
                            <span class="material-icons-outlined">remove_circle</span>
                        </button>
                    </td>
                </tr>
            </template>
        </table>

        <button type="button" class="mt-2 btn btn-primary" @click="addParameter('')">
            <span class="material-icons-outlined">add_circle</span> {{ __('Thêm thông số') }}
        </button>
    </div>
     {{-- /Key-value form control --}}
</div>

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('parameterFormControl{{ $componentId }}', () => ({
        addParameter(key = '') {
            this.{{ $attributes->get('x-model') }}.push({ key: key, value: ''});
        },

        removeParameter(index) {
            this.{{ $attributes->get('x-model') }}.splice(index, 1);
        },

        fresh() {
            this.{{ $attributes->get('x-model') }} = []
        },

        loadParameterSet(e) {
            this.fresh();
            const parameters = JSON.parse(e.target.value);
            for (parameter of parameters) {
                this.addParameter(parameter);
            }
        }
    }));
});
</script>
@endpush