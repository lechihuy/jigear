@extends('admin.layouts.app')

@php
    $title = __('Chi tiết bộ thông số sản phẩm');
@endphp

@section('title', $title)

@section('content')
{{-- Panel --}}
<x-admin.panel 
    :name="$title" 
    mode="detail" 
    prefixRouteName="admin.product-parameter-sets."
    :resourceId="$productParameterSet->id"
    :resource="$productParameterSet"
>

    {{-- ID --}}
    <x-admin.panel.item label="ID">
        <x-admin.detail.text :value="$productParameterSet->id" />
    </x-admin.panel.item>

    {{-- Key --}}
    <x-admin.panel.item label="Tên">
        <x-admin.detail.text :value="$productParameterSet->key" />
    </x-admin.panel.item>

    {{-- Parameters --}}
    <x-admin.panel.item label="Thông số sản phẩm">
        <x-admin.detail.has-many 
            :children="$productParameterSet->parameters" 
            prefixRouteName="admin.product-parameter-sets.parameters."
        />
    </x-admin.panel.item>

    {{-- Created at --}}
    <x-admin.panel.item label="Ngày tạo">
        <x-admin.detail.text
            :value="$productParameterSet->created_at" 
        />
    </x-admin.panel.item>

    {{-- Updated at --}}
    <x-admin.panel.item label="Lần cập nhật cuối">
        <x-admin.detail.text
            :value="$productParameterSet->updated_at" 
        />
    </x-admin.panel.item>

</x-admin.panel>
{{-- /Panel --}}

{{-- Action buttons --}}
<div class="flex items-center mt-5">
    <div class="mr-auto">
        <x-admin.button.cancel :url="route('admin.product-parameter-sets.index')" />
    </div>
</div>
{{-- /Action buttons --}}
@endsection
