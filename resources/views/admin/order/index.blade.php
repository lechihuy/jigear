@extends('admin.layouts.app')

@php
    $title = __('Đơn hàng');
@endphp

@section('title', $title)

@section('content')

<x-admin.resource
    :name="$title"
    prefixRouteName="admin.orders."
    :items="$orders"
    :hasItems="$hasOrders"
    :hasFilter="$hasFilter"
>
    <x-admin.resource.table>
        <x-slot:filter>
        </x-slot>

        <x-slot:columns>
            <x-admin.resource.column name="ID" column="id" :sortable="true" />
            <x-admin.resource.column name="Mã" column="code" :sortable="true" />
            <x-admin.resource.column name="Trạng thái" column="status" />
            <x-admin.resource.column name="Tổng tiền" column="total" :sortable="true" />
        </x-slot>
        
        <x-slot:rows>
            @foreach ($orders as $order)
                <x-admin.resource.row :item="$order">
                    <x-admin.resource.item.text :value="$order->id" />

                    {{-- Code --}}
                    <x-admin.resource.item.link 
                        :url="route('admin.orders.show', $order)" 
                        :label="$order->code"
                    />

                    {{-- Status --}}
                    <x-admin.resource.item.select
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
                                'label' => 'Đã giao'
                            ],
                            'canceled' => [
                                'type' => 'danger',
                                'label' => 'Đã hủy  '
                            ]
                        ]" 
                        :value="$order->status"
                    />

                    {{-- Total --}}
                    <x-admin.resource.item.currency :value="$order->total" />

                </x-admin.resource.row>
            @endforeach
        </x-slot>
    </x-admin.resource.table>
</x-admin.resource>
@endsection