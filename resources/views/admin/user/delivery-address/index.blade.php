@extends('admin.layouts.app')

@php
    $title = __('Địa chỉ giao hàng');
@endphp

@section('title', $title)

@section('content')

<x-admin.resource
    :name="$title"
    :parent="$user"
    :parentUrl="$userDetailUrl"
    parentDisplay="email"
    parentLabel="Người dùng"
    mode="belongs-to"
    prefixRouteName="admin.users.delivery-addresses."
    :items="$deliveryAddresses"
    :hasItems="$hasDeliveryAddresses"
    :hasFilter="$hasFilter"
>
    <x-admin.resource.table>
        <x-slot:filter>
            <x-admin.resource.filter.boolean label="Mặc định" name="is_default" :options="[
                'Có' => 1,
                'Không' => 0
            ]" />
        </x-slot>

        <x-slot:columns>
            <x-admin.resource.column name="ID" column="id" :sortable="true" />
            <x-admin.resource.column name="Địa chỉ" column="address" :sortable="true" />
            <x-admin.resource.column name="Số điện thoại" column="phone_number" :sortable="true" />
            <x-admin.resource.column name="Mặc định" column="is_default" align="center" />
        </x-slot>
        
        <x-slot:rows>
            @foreach ($deliveryAddresses as $deliveryAddress)
                <x-admin.resource.row :item="$deliveryAddress">
                    {{-- ID --}}
                    <x-admin.resource.item.text :value="$deliveryAddress->id" />

                    {{-- Address --}}
                    <x-admin.resource.item.link 
                        :url="route('admin.users.delivery-addresses.show', [$user, $deliveryAddress])" 
                        :label="$deliveryAddress->address"
                    />

                    {{-- Phone number --}}
                    <x-admin.resource.item.text :value="$deliveryAddress->phone_number" />

                    {{-- Is default --}}
                    <x-admin.resource.item.boolean 
                        :value="$deliveryAddress->is_default" 
                    />

                </x-admin.resource.row>
            @endforeach
        </x-slot>
    </x-admin.resource.table>
</x-admin.resource>
@endsection