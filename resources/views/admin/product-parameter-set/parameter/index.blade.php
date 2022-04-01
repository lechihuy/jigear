@extends('admin.layouts.app')

@php
    $title = __('Thông số sản phẩm');
@endphp

@section('title', $title)

@section('content')

<x-admin.resource
    :name="$title"
    :parent="$productParameterSet"
    :parentUrl="$productParameterSetDetailUrl"
    parentDisplay="key"
    parentLabel="Bộ thông số sản phẩm"
    mode="belongs-to"
    prefixRouteName="admin.product-parameter-sets.parameters."
    :items="$parameters"
    :hasItems="$hasParameters"
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
            @foreach ($parameters as $parameter)
                <x-admin.resource.row :item="$parameter">
                    <x-admin.resource.item.text :value="$parameter->id" />

                    <x-admin.resource.item.link 
                        :url="route('admin.product-parameter-sets.parameters.show', [$productParameterSet, $parameter])" 
                        :label="$parameter->key"
                    />

                </x-admin.resource.row>
            @endforeach
        </x-slot>
    </x-admin.resource.table>
</x-admin.resource>
@endsection