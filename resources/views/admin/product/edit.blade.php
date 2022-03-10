@extends('admin.layouts.app')

@php
    $title = __('Sửa sản phẩm');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="editProductForm" @submit.prevent="submit">
    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- ID --}}
        <x-admin.panel.item label="ID">
            <x-admin.detail.text :value="$product->id" />
        </x-admin.panel.item>

        {{-- # Basic --}}
        <x-admin.panel.heading value="Cơ bản" />

        {{-- Thumbnail --}}
        <x-admin.panel.item label="Thumbnail">
            <x-admin.form.thumbnail 
                name="thumbnail" 
                x-model="thumbnail" 
                :url="optional($product->thumbnail)->url" 
            />
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

        {{-- # Sell information --}}
        <x-admin.panel.heading value="Thông tin bán hàng" />

        {{-- Unit price --}}
        <x-admin.panel.item label="Giá bán">
            <x-admin.form.number name="unit_price" x-model="unit_price" />
        </x-admin.panel.item>

        {{-- Stock --}}
        <x-admin.panel.item label="Tồn kho">
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

        {{-- Brand ID --}}
        <x-admin.panel.item label="Thương hiệu">
            <x-admin.form.select name="brand_id" x-model="brand_id" :options="$brandOptions" />
        </x-admin.panel.item>

        {{-- Description --}}
        <x-admin.panel.item label="Mô tả">
            <x-admin.form.textarea name="description" x-model="description" />
        </x-admin.panel.item>

        {{-- Detail --}}
        <x-admin.panel.item label="Nội dung chi tiết">
            <x-admin.form.trix name="detail" x-model="detail" id="detail" value="{!! $product->detail !!}" />
        </x-admin.panel.item>

        {{-- Previews --}}
        <x-admin.panel.item label="Ảnh xem trước">
            <x-admin.form.gallary name="previews" x-model="previews" />
        </x-admin.panel.item>

        {{-- Parameters --}}
        <x-admin.panel.item label="Thông số sản phẩm">
            <x-admin.form.parameter name="parameters" x-model="parameters" />
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
        thumbnail: '',
        title: '{{ $product->title }}',
        sku: '{{ $product->sku }}',
        catalog_id: '{{ $product->catalog_id }}',
        brand_id: '{{ $product->brand_id }}',
        unit_price: '{{ $product->unit_price }}',
        stock: '{{ $product->stock }}',
        published: {{ $product->published ? 'true' : 'false' }},
        purchasable: {{ $product->purchasable ? 'true' : 'false' }},
        description: '{{ $product->description }}',
        detail: '{!! $product->detail !!}',
        parameters: JSON.parse(@json($product->parameters ?? '[]')),
        previews: @json($product->previews),
        loading: false,
        submit() {
            this.loading = true;
            this.detail = document.getElementById('detail').value
            this.published = this.published ? 1 : 0
            this.purchasable = this.purchasable ? 1 : 0
            const parameters = JSON.stringify(this.parameters)
            let data = new FormData()

            data.append('_method', 'PUT')
            data.append('thumbnail', this.thumbnail)
            data.append('title', this.title)
            data.append('sku', this.sku)
            data.append('catalog_id', this.catalog_id)
            data.append('brand_id', this.brand_id)
            data.append('unit_price', this.unit_price)
            data.append('stock', this.stock)
            data.append('published', this.published)
            data.append('purchasable', this.purchasable)
            data.append('description', this.description)
            data.append('detail', this.detail)
            data.append('parameters', parameters)

            for (const preview of this.previews) {
                data.append('previews[]', preview instanceof File ? preview : JSON.stringify(preview))
            }

            axios.post(route('admin.products.update', { product: '{{ $product->id }}' }), data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(res => {
                window.location.href = route('admin.products.show', { product: res.data.product.id });
            }).catch(err => {
                console.log(err)
                Alpine.store('toast').show('danger', err.response.data.message)
            }).finally(() => {
                this.loading = false;
            });
        }
    }));
});
</script>
@endpush
