@extends('admin.layouts.app')

@php
    $title = __('Chi tiết thông số sản phẩm');
@endphp

@section('title', $title)

@section('content')
{{-- Panel --}}
<x-admin.panel 
    :name="$title" 
    mode="detail" 
    prefixRouteName="admin.product-parameter-sets.parameters."
    :resourceId="$parameter->id"
    :resource="$parameter"
    :parent="$productParameterSet"
    :parentUrl="$productParameterSetDetailUrl"
    parentDisplay="key"
    parentLabel="Bộ thông số sản phẩm"
>

    {{-- ID --}}
    <x-admin.panel.item label="ID">
        <x-admin.detail.text :value="$parameter->id" />
    </x-admin.panel.item>

    {{-- Key --}}
    <x-admin.panel.item label="Tên">
        <x-admin.detail.text :value="$parameter->key" />
    </x-admin.panel.item>

    {{-- Product Parameter Set ID --}}
    <x-admin.panel.item label="Bộ thông số sản phẩm">
        <x-admin.detail.belongs-to 
            :owner="$parameter->set" 
            prefixRouteName="admin.product-parameter-sets."
            display="key" 
        />
    </x-admin.panel.item>

    {{-- Created at --}}
    <x-admin.panel.item label="Ngày tạo">
        <x-admin.detail.text
            :value="$parameter->created_at" 
        />
    </x-admin.panel.item>

    {{-- Updated at --}}
    <x-admin.panel.item label="Lần cập nhật cuối">
        <x-admin.detail.text
            :value="$parameter->updated_at" 
        />
    </x-admin.panel.item>

</x-admin.panel>
{{-- /Panel --}}

{{-- Action buttons --}}
<div class="flex items-center mt-5">
    <div class="mr-auto">
        <x-admin.button.cancel :url="route('admin.product-parameter-sets.parameters.index', [$productParameterSet])" />
    </div>
</div>
{{-- /Action buttons --}}
@endsection
