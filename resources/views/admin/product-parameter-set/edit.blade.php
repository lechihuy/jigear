@extends('admin.layouts.app')

@php
    $title = __('Sửa bộ thông số sản phẩm');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="editProductParameterSetForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- ID --}}
        <x-admin.panel.item label="ID">
            <x-admin.detail.text :value="$productParameterSet->id" />
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
            <x-admin.button.cancel :url="route('admin.product-parameter-sets.show', $productParameterSet)" />
        </div>

        <div class="flex items-center gap-2 ml-auto">
            <x-admin.button.delete 
                prefixRoute="admin.product-parameter-sets." 
                :resource="$productParameterSet" 
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
    Alpine.data('editProductParameterSetForm', () => ({
        key: '{{ $productParameterSet->key }}',
        loading: false,
        submit() {
            this.loading = true;
            
            axios.put(route('admin.product-parameter-sets.update', { 
                product_parameter_set: '{{ $productParameterSet->id }}',
            }), {
                key: this.key,
            }).then(res => {
                window.location.href = route('admin.product-parameter-sets.show', { 
                    product_parameter_set: res.data.product_parameter_set.id,
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
