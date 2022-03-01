@extends('admin.layouts.app')

@php
    $title = __('Chi tiết sản phẩm');
@endphp

@section('title', $title)

@section('content')
{{-- Panel --}}
<x-admin.panel 
    :name="$title" 
    mode="detail" 
    prefixRouteName="admin.products."
    :resourceId="$product->id"
    :resource="$product"
>

    {{-- ID --}}
    <x-admin.panel.item label="ID">
        <x-admin.detail.text :value="$product->id" />
    </x-admin.panel.item>
    
    {{-- Title --}}
    <x-admin.panel.item label="Tiêu đề">
        <x-admin.detail.text :value="$product->title" />
    </x-admin.panel.item>

    {{-- SKU --}}
    <x-admin.panel.item label="SKU">
        <x-admin.detail.code :value="$product->sku" />
    </x-admin.panel.item>

    {{-- Catalog ID --}}
    <x-admin.panel.item label="Danh mục">
        <x-admin.detail.belongs-to 
            :owner="$product->catalog" 
            prefixRouteName="admin.catalogs."
            display="title" 
        />
    </x-admin.panel.item>

    {{-- Unit price --}}
    <x-admin.panel.item label="Giá bán">
        <x-admin.detail.currency :value="$product->unit_price" />
    </x-admin.panel.item>

    {{-- Stock --}}
    <x-admin.panel.item label="Tồn kho">
        <x-admin.detail.text :value="$product->stock" />
    </x-admin.panel.item>

    {{-- Published --}}
    <x-admin.panel.item label="Xuất bản">
        <x-admin.detail.boolean
            :value="$product->published" 
        />
    </x-admin.panel.item>

    {{-- Purchasable --}}
    <x-admin.panel.item label="Có thể bán">
        <x-admin.detail.boolean
            :value="$product->purchasable" 
        />
    </x-admin.panel.item>

    {{-- Description --}}
    <x-admin.panel.item label="Mô tả">
        <x-admin.detail.text
            :value="$product->description" 
        />
    </x-admin.panel.item>

    {{-- Description --}}
    <x-admin.panel.item label="Nội dung chi tiết">
        <x-admin.detail.trix
            :value="$product->detail" 
        />
    </x-admin.panel.item>

    {{-- Created at --}}
    <x-admin.panel.item label="Ngày tạo">
        <x-admin.detail.text
            :value="$product->created_at" 
        />
    </x-admin.panel.item>

    {{-- Updated at --}}
    <x-admin.panel.item label="Lần cập nhật cuối">
        <x-admin.detail.text
            :value="$product->updated_at" 
        />
    </x-admin.panel.item>

</x-admin.panel>
{{-- /Panel --}}

{{-- Action buttons --}}
<div class="flex items-center mt-5">
    <div class="mr-auto">
        <x-admin.button.cancel :url="route('admin.products.index')" />
    </div>
</div>
{{-- /Action buttons --}}
@endsection
