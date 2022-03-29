@extends('admin.layouts.app')

@php
    $title = __('Chi tiết địa chỉ giao hàng');
@endphp

@section('title', $title)

@section('content')
{{-- Panel --}}
<x-admin.panel 
    :name="$title" 
    mode="detail" 
    prefixRouteName="admin.users.delivery-addresses."
    :resourceId="$deliveryAddress->id"
    :resource="$deliveryAddress"
    :parent="$user"
    :parentUrl="$userDetailUrl"
    parentDisplay="email"
    parentLabel="Người dùng"
>

    {{-- ID --}}
    <x-admin.panel.item label="ID">
        <x-admin.detail.text :value="$deliveryAddress->id" />
    </x-admin.panel.item>

    {{-- Address --}}
    <x-admin.panel.item label="Địa chỉ">
        <x-admin.detail.text :value="$deliveryAddress->address" />
    </x-admin.panel.item>

    {{-- Phone number --}}
    <x-admin.panel.item label="Số điện thoại">
        <x-admin.detail.text :value="$deliveryAddress->phone_number" />
    </x-admin.panel.item>

    {{-- Is default --}}
    <x-admin.panel.item label="Mặc định">
        <x-admin.detail.boolean
            :value="$deliveryAddress->is_default" 
        />
    </x-admin.panel.item>

    {{-- Created at --}}
    <x-admin.panel.item label="Ngày tạo">
        <x-admin.detail.text
            :value="$deliveryAddress->created_at" 
        />
    </x-admin.panel.item>

    {{-- Updated at --}}
    <x-admin.panel.item label="Lần cập nhật cuối">
        <x-admin.detail.text
            :value="$deliveryAddress->updated_at" 
        />
    </x-admin.panel.item>

</x-admin.panel>
{{-- /Panel --}}

{{-- Action buttons --}}
<div class="flex items-center mt-5">
    <div class="mr-auto">
        <x-admin.button.cancel :url="route('admin.users.delivery-addresses.index', [$user])" />
    </div>
</div>
{{-- /Action buttons --}}
@endsection
