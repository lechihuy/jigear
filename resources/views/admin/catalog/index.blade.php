@extends('admin.layouts.app')

@php
    $title = __('Danh mục');
@endphp

@section('title', $title)

@section('content')

<x-admin.resource
    :name="$title"
    prefixRouteName="admin.catalogs."
    :items="$catalogs"
    :hasItems="$hasCatalogs"
    :hasFilter="$hasFilter"
>
    <x-admin.resource.table>
        <x-slot:filter>
            <x-admin.resource.filter.boolean label="Xuất bản" name="published" :options="[
                'Xuất bản' => 1,
                'Ẩn' => 0
            ]" />
            <x-admin.resource.filter.select label="Danh mục cha" name="parent_id" :options="$catalogOptions" />
        </x-slot>

        <x-slot:columns>
            <x-admin.resource.column name="ID" column="id" :sortable="true" />
            <x-admin.resource.column name="Tiêu đề" column="title" :sortable="true" />
            <x-admin.resource.column name="Danh mục cha" />
            <x-admin.resource.column name="Xuất bản" align="center" />
        </x-slot>
        
        <x-slot:rows>
            @foreach ($catalogs as $catalog)
                <x-admin.resource.row :item="$catalog">
                    <x-admin.resource.item.text :value="$catalog->id" />

                    <x-admin.resource.item.link 
                        :url="route('admin.catalogs.show', $catalog)" 
                        :label="$catalog->title"
                    />

                    {{-- Parent ID --}}
                    <x-admin.resource.item.belongs-to 
                        :owner="$catalog->parent" 
                        prefixRouteName="admin.catalogs."
                        display="title" 
                    />

                    {{-- Published --}}
                    <x-admin.resource.item.boolean 
                        :value="$catalog->published" 
                    />
                    
                </x-admin.resource.row>
            @endforeach
        </x-slot>
    </x-admin.resource.table>
</x-admin.resource>
@endsection