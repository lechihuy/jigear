@extends('admin.layouts.app')

@php
    $title = __('Thương hiệu');
@endphp

@section('title', $title)

@section('content')

<x-admin.resource
    :name="$title"
    prefixRouteName="admin.brands."
    :items="$brands"
    :hasItems="$hasBrands"
    :hasFilter="$hasFilter"
>
    <x-admin.resource.table>
        <x-slot:filter>
        </x-slot>

        <x-slot:columns>
            <x-admin.resource.column name="ID" column="id" :sortable="true" />
            <x-admin.resource.column name="" align="center" />
            <x-admin.resource.column name="Tên" column="name" :sortable="true" />
        </x-slot>
        
        <x-slot:rows>
            @foreach ($brands as $brand)
                <x-admin.resource.row :item="$brand">
                    {{-- ID --}}
                    <x-admin.resource.item.text :value="$brand->id" />

                    {{-- Thumbnail --}}
                    <x-admin.resource.item.thumbnail 
                        :value="optional($brand->thumbnail)->url"
                    />

                    {{-- Name --}}
                    <x-admin.resource.item.link 
                        :url="route('admin.brands.show', $brand)" 
                        :label="$brand->name"
                    />
                </x-admin.resource.row>
            @endforeach
        </x-slot>
    </x-admin.resource.table>
</x-admin.resource>
@endsection