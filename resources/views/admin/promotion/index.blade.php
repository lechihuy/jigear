@extends('admin.layouts.app')

@php
    $title = __('Khuyến mãi');
@endphp

@section('title', $title)

@section('content')

<x-admin.resource
    :name="$title"
    prefixRouteName="admin.promotions."
    :items="$promotions"
    :hasItems="$hasPromotions"
    :hasFilter="$hasFilter"
>
    <x-admin.resource.table>
        <x-slot:filter>
            <x-admin.resource.filter.boolean label="Loại" name="type" :options="[
                'Voucher' => 'voucher',
                'Giảm giá' => 'sale_off'
            ]" />
            <x-admin.resource.filter.boolean label="Kích hoạt" name="actived" :options="[
                'Có' => 1,
                'Không' => 0
            ]" />
            <x-admin.resource.filter.boolean label="Số lượt còn lại" name="is_remaining_uses" :options="[
                'Còn lượt' => 1,
                'Hết lượt' => 0
            ]" />
            <x-admin.resource.filter.boolean label="Hiệu lực" name="effect" :options="[
                'Chưa có hiệu lực' => 'no-effect',
                'Đang có hiệu lực' => 'is-in-effect',
                'Hết hiệu lực' => 'expire',
            ]" />
        </x-slot>

        <x-slot:columns>
            <x-admin.resource.column name="ID" column="id" :sortable="true" />
            <x-admin.resource.column name="Tên" column="name" :sortable="true" />
            <x-admin.resource.column name="Loại" column="type" />
            <x-admin.resource.column name="Kích hoạt" align="center" />
            <x-admin.resource.column name="Lượt còn lại" column="remaining_uses" :sortable="true" />
        </x-slot>
        
        <x-slot:rows>
            @foreach ($promotions as $promotion)
                <x-admin.resource.row :item="$promotion">
                    {{-- ID --}}
                    <x-admin.resource.item.text :value="$promotion->id" />

                    {{-- Name --}}
                    <x-admin.resource.item.link 
                        :url="route('admin.promotions.show', $promotion)" 
                        :label="$promotion->name"
                    />

                    {{-- Type --}}
                    <x-admin.resource.item.select
                        :options="[
                            'sale_off' => [
                                'type' => 'light',
                                'label' => 'Giảm giá'
                            ],
                            'voucher' => [
                                'type' => 'danger',
                                'label' => 'Voucher'
                            ]
                        ]" 
                        :value="$promotion->type"
                    />

                    {{-- Actived --}}
                    <x-admin.resource.item.boolean 
                        :value="$promotion->actived" 
                    />

                    {{-- Remaining uses --}}
                    <x-admin.resource.item.text :value="$promotion->remaining_uses" />

                </x-admin.resource.row>
            @endforeach
        </x-slot>
    </x-admin.resource.table>
</x-admin.resource>
@endsection