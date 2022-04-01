@extends('admin.layouts.app')

@php
    $title = __('Mục đơn hàng');
@endphp

@section('title', $title)

@section('content')

<x-admin.resource
    :name="$title"
    :parent="$order"
    :parentUrl="$orderDetailUrl"
    parentDisplay="code"
    parentLabel="Đơn hàng"
    mode="belongs-to"
    prefixRouteName="admin.orders.items."
    :items="$items"
    :hasItems="$hasItems"
    :hasFilter="$hasFilter"
>
    <x-admin.resource.table>
        <x-slot:filter>
        </x-slot>

        <x-slot:columns>
            <x-admin.resource.column name="ID" column="id" :sortable="true" />
            <x-admin.resource.column name="" align="center" />
            <x-admin.resource.column name="Tên sản phẩm" />
            <x-admin.resource.column name="Số lượng" column="qty" :sortable="true" />
            <x-admin.resource.column name="Đơn giá" column="unit_price" :sortable="true" />
            <x-admin.resource.column name="Thành tiền" />
        </x-slot>
        
        <x-slot:rows>
            @foreach ($items as $item)
                <x-admin.resource.row :item="$item">
                    {{-- ID --}}
                    <x-admin.resource.item.text :value="$item->id" />

                    {{-- Thumbnail --}}
                    <x-admin.resource.item.thumbnail 
                        :value="optional($item->product->thumbnail)->url"
                    />

                    {{-- Product name --}}
                    <x-admin.resource.item.belongs-to 
                        :owner="$item->product" 
                        prefixRouteName="admin.products."
                        display="title" 
                    />

                    {{-- Quantity --}}
                    <x-admin.resource.item.text :value="$item->qty" />

                    {{-- Unit price --}}
                    <x-admin.resource.item.currency 
                        :value="$item->unit_price" 
                    />

                    {{-- Total --}}
                    <x-admin.resource.item.currency 
                        :value="$item->unit_price * $item->qty" 
                    />

                </x-admin.resource.row>
            @endforeach
        </x-slot>
    </x-admin.resource.table>
</x-admin.resource>
@endsection