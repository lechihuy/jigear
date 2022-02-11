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
