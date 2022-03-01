@extends('admin.layouts.app')

@php
    $title = __('Sửa sản phẩm');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="editProductForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- Title --}}
        <x-admin.panel.item label="ID">
            <x-admin.detail.text :value="$product->id" />
        </x-admin.panel.item>

        {{-- Title --}}
        <x-admin.panel.item label="Tiêu đề" :required="true">
            <x-admin.form.text name="title" x-model="title" />
        </x-admin.panel.item>

        {{-- SKU --}}
        <x-admin.panel.item label="SKU" :required="true">
            <x-admin.form.text name="sku" x-model="sku" />
        </x-admin.panel.item>

        {{-- Catalog ID --}}
        <x-admin.panel.item label="Danh mục">
            <x-admin.form.select name="catalog_id" x-model="catalog_id" :options="$catalogOptions" />
        </x-admin.panel.item>

        {{-- Unit price --}}
        <x-admin.panel.item label="Giá bán" :required="true">
            <x-admin.form.number name="unit_price" x-model="unit_price" />
        </x-admin.panel.item>

        {{-- Stock --}}
        <x-admin.panel.item label="Tồn kho" :required="true">
            <x-admin.form.number name="stock" x-model="stock" />
        </x-admin.panel.item>

        {{-- Published --}}
        <x-admin.panel.item label="Xuất bản">
            <x-admin.form.boolean name="published" x-model="published" />
        </x-admin.panel.item>

        {{-- Purchasable --}}
        <x-admin.panel.item label="Có thể bán">
            <x-admin.form.boolean name="purchasable" x-model="purchasable" />
        </x-admin.panel.item>

        {{-- Description --}}
        <x-admin.panel.item label="Mô tả">
            <x-admin.form.textarea name="description" x-model="description" />
        </x-admin.panel.item>

        {{-- Detail --}}
        <x-admin.panel.item label="Nội dung chi tiết">
            <x-admin.form.trix name="detail" x-model="detail" id="detail" value="{{ $product->detail }}" />
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.products.show', [$product])" />
        </div>

        <div class="flex items-center gap-2 ml-auto">
            <x-admin.button.delete prefixRoute="admin.products." :resource="$product" />
            <x-admin.button.confirm-update />
        </div>
    </div>
    {{-- /Action buttons --}}
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('editProductForm', () => ({
        title: '{{ $product->title }}',
        sku: '{{ $product->sku }}',
        catalog_id: '{{ $product->catalog_id }}',
        unit_price: '{{ $product->unit_price }}',
        stock: '{{ $product->stock }}',
        published: {{ $product->published ? 'true' : 'false' }},
        purchasable: {{ $product->purchasable ? 'true' : 'false' }},
        description: '{{ $product->description }}',
        detail: '{{ $product->detail }}',
        loading: false,
        submit() {
            this.loading = true;
            this.detail = document.getElementById('detail').value
            
            axios.put(route('admin.products.update', { product: '{{ $product->id }}' }), {
                title: this.title,
                sku: this.sku,
                catalog_id: this.catalog_id,
                unit_price: this.unit_price,
                stock: this.stock,
                published: this.published,
                purchasable: this.purchasable,
                description: this.description,
                detail: this.detail,
            }).then(res => {
                window.location.href = route('admin.products.show', { product: res.data.product.id });
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
