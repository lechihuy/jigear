@extends('admin.layouts.app')

@php
    $title = __('Chi tiết mục sản phẩm');
@endphp

@section('title', $title)

@section('content')
{{-- Panel --}}
<x-admin.panel 
    :name="$title" 
    mode="detail" 
    prefixRouteName="admin.orders.items."
    :resourceId="$item->id"
    :resource="$item"
    :parent="$order"
    :parentUrl="$orderDetailUrl"
    parentDisplay="code"
    parentLabel="Đơn hàng"
>

    {{-- ID --}}
    <x-admin.panel.item label="ID">
        <x-admin.detail.text :value="$item->id" />
    </x-admin.panel.item>

    {{-- Thumbnail --}}
    <x-admin.panel.item label="Thumbnail">
        <x-admin.detail.thumbnail :value="optional($item->product->thumbnail)->url" />
    </x-admin.panel.item>

    {{-- Product --}}
    <x-admin.panel.item label="Sản phẩm">
        <x-admin.detail.belongs-to 
            :owner="$item->product" 
            prefixRouteName="admin.products."
            display="title" 
        />
    </x-admin.panel.item>

    {{-- Quantity --}}
    <x-admin.panel.item label="Số lượng">
        <x-admin.detail.text :value="$item->qty" />
    </x-admin.panel.item>

    {{-- Unit price --}}
    <x-admin.panel.item label="Đơn giá">
        <x-admin.detail.currency :value="$item->unit_price" />
    </x-admin.panel.item>

    {{-- Total --}}
    <x-admin.panel.item label="Thành tiền">
        <x-admin.detail.currency :value="$item->unit_price * $item->qty" class="font-semibold text-red-500" />
    </x-admin.panel.item>

</x-admin.panel>
{{-- /Panel --}}

{{-- Action buttons --}}
<div class="flex items-center mt-5">
    <div class="mr-auto">
        <x-admin.button.cancel :url="route('admin.orders.items.index', [$order])" />
    </div>
</div>
{{-- /Action buttons --}}
@endsection
