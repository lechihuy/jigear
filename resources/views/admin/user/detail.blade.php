@extends('admin.layouts.app')

@php
    $title = __('Chi tiết người dùng');
@endphp

@section('title', $title)

@section('content')
{{-- Panel --}}
<x-admin.panel 
    :name="$title" 
    mode="detail" 
    prefixRouteName="admin.users."
    :resourceId="$user->id"
    :resource="$user"
>

    {{-- ID --}}
    <x-admin.panel.item label="ID">
        <x-admin.detail.text :value="$user->id" />
    </x-admin.panel.item>

    {{-- Title --}}
    <x-admin.panel.item label="Email">
        <x-admin.detail.text :value="$user->email" />
    </x-admin.panel.item>

    {{-- Role --}}
    <x-admin.panel.item label="Quyền">
        <x-admin.detail.select 
            :options="[
                'customer' => [
                    'type' => 'light',
                    'label' => 'Người dùng'
                ],
                'admin' => [
                    'type' => 'danger',
                    'label' => 'Quản trị viên'
                ]
            ]" 
            :value="$user->role"
        />
    </x-admin.panel.item>

    {{-- First name --}}
    <x-admin.panel.item label="Họ">
        <x-admin.detail.text :value="$user->first_name" />
    </x-admin.panel.item>

    {{-- Last name --}}
    <x-admin.panel.item label="Tên">
        <x-admin.detail.text :value="$user->last_name" />
    </x-admin.panel.item>

    {{-- Gender --}}
    <x-admin.panel.item label="Giới tính">
        <x-admin.detail.text :value="$user->genderText" />
    </x-admin.panel.item>

    {{-- Email verified --}}
    <x-admin.panel.item label="Xác minh">
        <x-admin.detail.boolean
            :value="$user->email_verified_at" 
        />
    </x-admin.panel.item>

    {{-- Parameters --}}
    @if ($user->isCustomer)
    <x-admin.panel.item label="Địa chỉ giao hàng">
        <x-admin.detail.has-many 
            :children="$user->deliveryAddresses" 
            prefixRouteName="admin.users.delivery-addresses."
        />
    </x-admin.panel.item>
    @endif
    
    {{-- Created at --}}
    <x-admin.panel.item label="Ngày tạo">
        <x-admin.detail.text
            :value="$user->created_at" 
        />
    </x-admin.panel.item>

    {{-- Updated at --}}
    <x-admin.panel.item label="Lần cập nhật cuối">
        <x-admin.detail.text
            :value="$user->updated_at" 
        />
    </x-admin.panel.item>

</x-admin.panel>
{{-- /Panel --}}

{{-- Action buttons --}}
<div class="flex items-center mt-5">
    <div class="mr-auto">
        <x-admin.button.cancel :url="route('admin.users.index')" />
    </div>
</div>
{{-- /Action buttons --}}
@endsection
