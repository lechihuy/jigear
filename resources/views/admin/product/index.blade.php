@extends('admin.layouts.app')

@php
    $title = __('Sản phẩm');
@endphp

@section('title', $title)

@section('content')

<x-admin.resource
    :name="$title"
    prefixRouteName="admin.products."
    :items="$products"
    :hasItems="$hasProducts"
    :hasFilter="$hasFilter"
>
    <x-admin.resource.table>
        <x-slot:filter>
            <x-admin.resource.filter.boolean label="Xuất bản" name="published" :options="[
                'Xuất bản' => 1,
                'Ẩn' => 0
            ]" />
            <x-admin.resource.filter.boolean label="Có thể bán" name="purchasable" :options="[
                'Có' => 1,
                'không' => 0
            ]" />
            <x-admin.resource.filter.boolean label="Tồn kho" name="is_stock" :options="[
                'Hết hàng' => 0,
                'Còn hàng' => 1,
            ]" />
            <x-admin.resource.filter.select label="Danh mục" name="catalog_id" :options="$catalogOptions" />
        </x-slot>

        <x-slot:columns>
            <x-admin.resource.column name="ID" column="id" :sortable="true" />
            <x-admin.resource.column name="" align="center" />
            <x-admin.resource.column name="Tiêu đề" column="title" :sortable="true" />
            <x-admin.resource.column name="SKU" column="sku" :sortable="true" />
            <x-admin.resource.column name="Giá bán" column="unit_price" :sortable="true" />
            <x-admin.resource.column name="Danh mục" />
            <x-admin.resource.column name="Xuất bản" align="center" />
        </x-slot>
        
        <x-slot:rows>
            @foreach ($products as $product)
                <x-admin.resource.row :item="$product">
                    <x-admin.resource.item.text :value="$product->id" />

                    {{-- Thumbnail --}}
                    <x-admin.resource.item.thumbnail 
                        :value="optional($product->thumbnail)->url"
                    />

                    {{-- Title --}}
                    <x-admin.resource.item.link 
                        :url="route('admin.products.show', $product)" 
                        :label="$product->title"
                    />

                    {{-- SKU --}}
                    <x-admin.resource.item.code 
                        :value="$product->sku"
                    />

                    {{-- Unit price --}}
                    <x-admin.resource.item.currency :value="$product->unit_price" />

                    {{-- Catalog ID --}}
                    <x-admin.resource.item.belongs-to 
                        :owner="$product->catalog" 
                        prefixRouteName="admin.catalogs."
                        display="title" 
                    />

                    {{-- Published --}}
                    <x-admin.resource.item.boolean 
                        :value="$product->published" 
                    />
                    
                </x-admin.resource.row>
            @endforeach
        </x-slot>
    </x-admin.resource.table>
</x-admin.resource>
@endsection