@extends('admin.layouts.app')

@php
    $title = __('Thông số sản phẩm');
@endphp

@section('title', $title)

@section('content')

<x-admin.resource
    :name="$title"
    prefixRouteName="admin.product-parameter-sets."
    :items="$productParameterSets"
    :hasItems="$hasProductParameterSets"
    :hasFilter="$hasFilter"
>
    <x-admin.resource.table>
        <x-slot:filter>
        </x-slot>

        <x-slot:columns>
            <x-admin.resource.column name="ID" column="id" :sortable="true" />
            <x-admin.resource.column name="Tên" column="key" :sortable="true" />
        </x-slot>
        
        <x-slot:rows>
            @foreach ($productParameterSets as $productParameterSet)
                <x-admin.resource.row :item="$productParameterSet">
                    <x-admin.resource.item.text :value="$productParameterSet->id" />

                    <x-admin.resource.item.link 
                        :url="route('admin.product-parameter-sets.show', $productParameterSet)" 
                        :label="$productParameterSet->key"
                    />

                </x-admin.resource.row>
            @endforeach
        </x-slot>
    </x-admin.resource.table>
</x-admin.resource>
@endsection