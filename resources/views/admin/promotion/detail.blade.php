@extends('admin.layouts.app')

@php
    $title = __('Chi tiết khuyến mãi');
@endphp

@section('title', $title)

@section('content')
{{-- Panel --}}
<x-admin.panel 
    :name="$title" 
    mode="detail" 
    prefixRouteName="admin.promotions."
    :resourceId="$promotion->id"
    :resource="$promotion"
>

    {{-- ID --}}
    <x-admin.panel.item label="ID">
        <x-admin.detail.text :value="$promotion->id" />
    </x-admin.panel.item>

    {{-- Name --}}
    <x-admin.panel.item label="Tên">
        <x-admin.detail.text :value="$promotion->name" />
    </x-admin.panel.item>

    {{-- Code --}}
    <x-admin.panel.item label="Mã">
        <x-admin.detail.code :value="$promotion->code" />
    </x-admin.panel.item>

    {{-- Type --}}
    <x-admin.panel.item label="Loại">
        <x-admin.detail.select 
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
    </x-admin.panel.item>

    {{-- Value --}}
    <x-admin.panel.item label="Giá trị">
        <x-admin.detail.currency 
            :value="$promotion->value" 
            :surfix="$promotion->is_percent_unit ? '%' : null" 
        />
    </x-admin.panel.item>

    {{-- Init uses --}}
    <x-admin.panel.item label="Số lượt phát hành">
        <x-admin.detail.text 
            :value="$promotion->init_uses" 
        />
    </x-admin.panel.item>

    {{-- Remaining uses --}}
    <x-admin.panel.item label="Số lượt còn lại">
        <x-admin.detail.text 
            :value="$promotion->remaining_uses" 
        />
    </x-admin.panel.item>

    {{-- Actived --}}
    <x-admin.panel.item label="Kích hoạt">
        <x-admin.detail.boolean
            :value="$promotion->actived" 
        />
    </x-admin.panel.item>

    {{-- Created at --}}
    <x-admin.panel.item label="Ngày tạo">
        <x-admin.detail.text
            :value="$promotion->created_at" 
        />
    </x-admin.panel.item>

    {{-- Updated at --}}
    <x-admin.panel.item label="Lần cập nhật cuối">
        <x-admin.detail.text
            :value="$promotion->updated_at" 
        />
    </x-admin.panel.item>

    {{-- Started at --}}
    <x-admin.panel.item label="Ngày có hiệu lực">
        <x-admin.detail.text
            :value="$promotion->started_at" 
        />
    </x-admin.panel.item>

    {{-- Ended at --}}
    <x-admin.panel.item label="Ngày kết thúc">
        <x-admin.detail.text
            :value="$promotion->ended_at" 
        />
    </x-admin.panel.item>

</x-admin.panel>
{{-- /Panel --}}

{{-- Action buttons --}}
<div class="flex items-center mt-5">
    <div class="mr-auto">
        <x-admin.button.cancel :url="route('admin.promotions.index')" />
    </div>
</div>
{{-- /Action buttons --}}
@endsection
