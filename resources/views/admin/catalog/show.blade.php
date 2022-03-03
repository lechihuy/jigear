@extends('admin.layouts.app')

@php
    $title = __('Chi tiết danh mục');
@endphp

@section('title', $title)

@section('content')
{{-- Panel --}}
<x-admin.panel 
    :name="$title" 
    mode="detail" 
    prefixRouteName="admin.catalogs."
    :resourceId="$catalog->id"
    :resource="$catalog"
>

    {{-- ID --}}
    <x-admin.panel.item label="ID">
        <x-admin.detail.text :value="$catalog->id" />
    </x-admin.panel.item>

    {{-- Title --}}
    <x-admin.panel.item label="Tiêu đề">
        <x-admin.detail.text :value="$catalog->title" />
    </x-admin.panel.item>

    {{-- Parent ID --}}
    <x-admin.panel.item label="Danh mục cha">
        <x-admin.detail.belongs-to 
            :owner="$catalog->parent" 
            prefixRouteName="admin.catalogs."
            display="title" 
        />
    </x-admin.panel.item>

    {{-- Published --}}
    <x-admin.panel.item label="Xuất bản">
        <x-admin.detail.boolean
            :value="$catalog->published" 
        />
    </x-admin.panel.item>

    {{-- Description --}}
    <x-admin.panel.item label="Mô tả">
        <x-admin.detail.text
            :value="$catalog->description" 
        />
    </x-admin.panel.item>

    {{-- Description --}}
    <x-admin.panel.item label="Nội dung chi tiết">
        <x-admin.detail.trix
            :value="$catalog->detail" 
        />
    </x-admin.panel.item>

    {{-- Created at --}}
    <x-admin.panel.item label="Ngày tạo">
        <x-admin.detail.text
            :value="$catalog->created_at" 
        />
    </x-admin.panel.item>

    {{-- Updated at --}}
    <x-admin.panel.item label="Lần cập nhật cuối">
        <x-admin.detail.text
            :value="$catalog->updated_at" 
        />
    </x-admin.panel.item>

</x-admin.panel>
{{-- /Panel --}}

{{-- Action buttons --}}
<div class="flex items-center mt-5">
    <div class="mr-auto">
        <x-admin.button.cancel :url="route('admin.catalogs.index')" />
    </div>
</div>
{{-- /Action buttons --}}
@endsection
