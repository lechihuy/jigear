@extends('admin.layouts.app')

@php
    $title = __('Chi tiết thương hiệu');
@endphp

@section('title', $title)

@section('content')
{{-- Panel --}}
<x-admin.panel 
    :name="$title" 
    mode="detail" 
    prefixRouteName="admin.brands."
    :resourceId="$brand->id"
    :resource="$brand"
>

    {{-- ID --}}
    <x-admin.panel.item label="ID">
        <x-admin.detail.text :value="$brand->id" />
    </x-admin.panel.item>

    {{-- Thumbnail --}}
    <x-admin.panel.item label="Thumbnail">
        <x-admin.detail.thumbnail :value="optional($brand->thumbnail)->url" />
    </x-admin.panel.item>

    {{-- Name --}}
    <x-admin.panel.item label="Tên">
        <x-admin.detail.text :value="$brand->name" />
    </x-admin.panel.item>

    {{-- Created at --}}
    <x-admin.panel.item label="Ngày tạo">
        <x-admin.detail.text
            :value="$brand->created_at" 
        />
    </x-admin.panel.item>

    {{-- Updated at --}}
    <x-admin.panel.item label="Lần cập nhật cuối">
        <x-admin.detail.text
            :value="$brand->updated_at" 
        />
    </x-admin.panel.item>

</x-admin.panel>
{{-- /Panel --}}

{{-- Action buttons --}}
<div class="flex items-center mt-5">
    <div class="mr-auto">
        <x-admin.button.cancel :url="route('admin.brands.index')" />
    </div>
</div>
{{-- /Action buttons --}}
@endsection
