@extends('admin.layouts.app')

@php
    $title = __('Chi tiết đơn hàng');
@endphp

@section('title', $title)

@section('content')
{{-- Panel --}}
<x-admin.panel 
    :name="$title" 
    mode="detail" 
    prefixRouteName="admin.orders."
    :resourceId="$order->id"
    :resource="$order"
>

    {{-- ID --}}
    <x-admin.panel.item label="ID">
        <x-admin.detail.text :value="$order->id" />
    </x-admin.panel.item>

    {{-- Code --}}
    <x-admin.panel.item label="Mã">
        <x-admin.detail.code :value="$order->code" />
    </x-admin.panel.item>

    {{-- Status --}}
    <x-admin.panel.item label="Trạng thái">
        <x-admin.detail.select
            :options="[
                'pending' => [
                    'type' => 'warning',
                    'label' => 'Đang đợi duyệt'
                ],
                'delivering' => [
                    'type' => 'primary',
                    'label' => 'Đang giao'
                ],
                'succeed' => [
                    'type' => 'success',
                    'label' => 'Thành công'
                ],
                'canceled' => [
                    'type' => 'danger',
                    'label' => 'Đã hủy  '
                ]
            ]" 
            :value="$order->status"
        />
    </x-admin.panel.item>

    {{-- Order items --}}
    <x-admin.panel.item label="Mục đơn hàng">
        <x-admin.detail.has-many 
            :children="$order->items" 
            prefixRouteName="admin.orders.items."
        />
    </x-admin.panel.item>

    {{-- # Customer information --}}
    <x-admin.panel.heading value="Thông tin khách hàng" />

    {{-- Customer ID --}}
    <x-admin.panel.item label="Khách hàng">
        <x-admin.detail.belongs-to 
            :owner="$order->customer" 
            prefixRouteName="admin.users."
            display="email" 
        />
    </x-admin.panel.item>

    {{-- Email --}}
    <x-admin.panel.item label="Email">
        <x-admin.detail.text :value="$order->email" />
    </x-admin.panel.item>

    {{-- First name --}}
    <x-admin.panel.item label="Họ">
        <x-admin.detail.text :value="$order->first_name" />
    </x-admin.panel.item>

    {{-- Last name --}}
    <x-admin.panel.item label="Tên">
        <x-admin.detail.text :value="$order->last_name" />
    </x-admin.panel.item>

    {{-- Gender --}}
    <x-admin.panel.item label="Giới tính">
        <x-admin.detail.text :value="App\Models\User::resolveGenderText($order->gender)" />
    </x-admin.panel.item>

    {{-- # Delivery address --}}
    <x-admin.panel.heading value="Địa chỉ giao hàng" />
    
    <x-admin.panel.item label="Địa chỉ">
        <x-admin.detail.text :value="$order->address" />
    </x-admin.panel.item>

    <x-admin.panel.item label="Số điện thoại">
        <x-admin.detail.text :value="$order->phone_number" />
    </x-admin.panel.item>

    {{-- # Bill information --}}
    <x-admin.panel.heading value="Thông tin thanh toán" />
    
    <x-admin.panel.item label="Tạm tính">
        <x-admin.detail.currency :value="$order->sub_total" />
    </x-admin.panel.item>

    <x-admin.panel.item label="Phí vận chuyển">
        <x-admin.detail.currency :value="$order->shipping_fee" />
    </x-admin.panel.item>

    <x-admin.panel.item label="Tổng">
        <x-admin.detail.currency :value="$order->total" class="font-semibold text-red-500" />
    </x-admin.panel.item>

    {{-- # Timestamps --}}
    <x-admin.panel.heading value="Thời gian" />
    
    {{-- Created at --}}
    <x-admin.panel.item label="Ngày tạo">
        <x-admin.detail.text
            :value="$order->created_at" 
        />
    </x-admin.panel.item>

    {{-- Updated at --}}
    <x-admin.panel.item label="Lần cập nhật cuối">
        <x-admin.detail.text
            :value="$order->updated_at" 
        />
    </x-admin.panel.item>

</x-admin.panel>
{{-- /Panel --}}

{{-- Action buttons --}}
<div class="flex items-center mt-5">
    <div class="mr-auto">
        <x-admin.button.cancel :url="route('admin.orders.index')" />
    </div>
</div>
{{-- /Action buttons --}}
@endsection
