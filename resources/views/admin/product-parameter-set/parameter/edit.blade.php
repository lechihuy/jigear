@extends('admin.layouts.app')

@php
    $title = __('Sửa thông số sản phẩm');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="editProductParameterForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel 
        :name="$title"
        :parent="$productParameterSet"
        :parentUrl="$productParameterSetDetailUrl"
        parentDisplay="key"
        parentLabel="Bộ thông số sản phẩm"
    >

        {{-- ID --}}
        <x-admin.panel.item label="ID">
            <x-admin.detail.text :value="$parameter->id" />
        </x-admin.panel.item>

        {{-- Key --}}
        <x-admin.panel.item label="Tên" :required="true">
            <x-admin.form.text name="key" x-model="key" />
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.product-parameter-sets.parameters.show', [$productParameterSet, $parameter])" />
        </div>

        <div class="flex items-center gap-2 ml-auto">
            <x-admin.button.delete 
                prefixRoute="admin.product-parameter-sets.parameters." 
                :resource="$parameter" 
                :parent="$productParameterSet"
            />
            <x-admin.button.confirm-update />
        </div>
    </div>
    {{-- /Action buttons --}}
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('editProductParameterForm', () => ({
        key: '{{ $parameter->key }}',
        loading: false,
        submit() {
            this.loading = true;
            
            axios.put(route('admin.product-parameter-sets.parameters.update', { 
                product_parameter_set: '{{ $productParameterSet->id }}',
                parameter: '{{ $parameter->id }}',
            }), {
                key: this.key,
            }).then(res => {
                window.location.href = route('admin.product-parameter-sets.parameters.show', { 
                    product_parameter_set: res.data.product_parameter_set.id,
                    parameter: res.data.parameter.id, 
                });
            }).catch(err => {
                Alpine.store('toast').show('danger', err.response.data.message)
            }).finally(() => {
                this.loading = false;
            });
        }
    }));
});
</script>
@endpush
