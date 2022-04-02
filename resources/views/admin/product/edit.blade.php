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

        {{-- Slug --}}
        <x-admin.panel.item label="URL thân thiện">
            <x-admin.form.text name="slug" x-model="slug" :placeholder="__('Có thể để trống để tự động tạo theo tiêu đề')" />
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
        <x-admin.panel.item label="Giá bán" :required="true">
            <x-admin.form.currency name="unit_price" x-model="unit_price" min="0" />
        </x-admin.panel.item>

        {{-- Stock --}}
        <x-admin.panel.item label="Tồn kho" :required="true">
            <x-admin.form.number name="stock" x-model="stock" min="0" />
        </x-admin.panel.item>

        {{-- Published --}}
        <x-admin.panel.item label="Xuất bản">
            <x-admin.form.boolean name="published" x-model="published" />
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

        {{-- # Timestamps --}}
        <x-admin.panel.heading value="Thời gian" />

        {{-- Created at --}}
        <x-admin.panel.item label="Ngày tạo" :required="true">
            <x-admin.form.timestamp x-model="created_at" name="created_at" step="1" />
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
        slug: '{{ $product->slug->slug }}',
        sku: '{{ $product->sku }}',
        catalog_id: '{{ $product->catalog_id }}',
        brand_id: '{{ $product->brand_id }}',
        unit_price: '{{ $product->unit_price }}',
        stock: '{{ $product->stock }}',
        published: {{ $product->published ? 'true' : 'false' }},
        brand_id: '{{ $product->brand_id }}',
        description: '{{ $product->description }}',
        detail: '{!! $product->detail !!}',
        parameters: JSON.parse(@json($product->parameters ?? '[]')),
        previews: @json($product->previews),
        created_at: '{{ Carbon\Carbon::parse($product->created_at)->format("Y-m-d\TH:i") }}',
        loading: false,
        submit() {
            this.loading = true;
            this.detail = document.getElementById('detail').value
            this.published = this.published ? 1 : 0
            const parameters = JSON.stringify(this.parameters)
            let data = new FormData()

            data.append('_method', 'PUT')
            data.append('thumbnail', this.thumbnail)
            data.append('title', this.title)
            data.append('slug', this.slug)
            data.append('sku', this.sku)
            data.append('catalog_id', this.catalog_id)
            data.append('unit_price', this.unit_price)
            data.append('stock', this.stock)
            data.append('published', this.published)
            data.append('brand_id', this.brand_id)
            data.append('description', this.description)
            data.append('detail', this.detail)
            data.append('parameters', parameters)
            data.append('created_at', this.created_at)

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
                Alpine.store('toast').show('danger', err.response.data.message)
            }).finally(() => {
                this.loading = false;
            });
        }
    }));
});
</script>
@endpush
