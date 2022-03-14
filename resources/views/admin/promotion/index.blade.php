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
            <x-admin.resource.filter.boolean label="Xuất bản" name="published" :options="[
                'Xuất bản' => 1,
                'Ẩn' => 0
            ]" />
        </x-slot>

        <x-slot:columns>
            <x-admin.resource.column name="ID" column="id" :sortable="true" />
            <x-admin.resource.column name="Tên" column="name" :sortable="true" />
            <x-admin.resource.column name="Mã" column="code" :sortable="true" />
            <x-admin.resource.column name="Loại" column="type" />
            <x-admin.resource.column name="Kích hoạt" align="center" />
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

                    {{-- Code --}}
                    <x-admin.resource.item.code 
                        :value="$promotion->code"
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

                </x-admin.resource.row>
            @endforeach
        </x-slot>
    </x-admin.resource.table>
</x-admin.resource>
@endsection