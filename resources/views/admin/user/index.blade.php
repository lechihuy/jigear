@extends('admin.layouts.app')

@php
    $title = __('Người dùng');
@endphp

@section('title', $title)

@section('content')

<x-admin.resource
    :name="$title"
    prefixRouteName="admin.users."
    :items="$users"
    :hasItems="$hasUsers"
    :hasFilter="$hasFilter"
>
    <x-admin.resource.table>
        <x-slot:filter>
            <x-admin.resource.filter.boolean label="Quyền" name="role" :options="[
                'Khách hàng' => 'customer',
                'Quản trị viên' => 'admin'
            ]" />

            <x-admin.resource.filter.boolean label="Xác minh" name="is_email_verified" :options="[
                'Đã xác minh' => 1,
                'Chưa xác minh' => 0
            ]" />
        </x-slot>

        <x-slot:columns>
            <x-admin.resource.column name="ID" column="id" :sortable="true" />
            <x-admin.resource.column name="Email" column="email" :sortable="true" />
            <x-admin.resource.column name="Họ" column="first_name" :sortable="true" />
            <x-admin.resource.column name="Tên" column="last_name" :sortable="true" />
            <x-admin.resource.column name="Quyền" column="role" />
            <x-admin.resource.column name="Xác minh" column="email_verified_at" align="center" />
        </x-slot>
        
        <x-slot:rows>
            @foreach ($users as $user)
                <x-admin.resource.row :item="$user">
                    {{-- ID --}}
                    <x-admin.resource.item.text :value="$user->id" />

                    {{-- Email --}}
                    <x-admin.resource.item.link 
                        :url="route('admin.users.show', $user)" 
                        :label="$user->email"
                    />

                    {{-- First name --}}
                    <x-admin.resource.item.text :value="$user->first_name" />

                    {{-- Last name --}}
                    <x-admin.resource.item.text :value="$user->last_name" />

                    {{-- Role --}}
                    <x-admin.resource.item.select
                        :options="[
                            'customer' => [
                                'type' => 'light',
                                'label' => 'Khách hàng'
                            ],
                            'admin' => [
                                'type' => 'danger',
                                'label' => 'Quản trị viên'
                            ]
                        ]" 
                        :value="$user->role"
                    />

                    {{-- Email verified at --}}
                    <x-admin.resource.item.boolean 
                        :value="$user->email_verified_at" 
                    />
                    
                </x-admin.resource.row>
            @endforeach
        </x-slot>
    </x-admin.resource.table>
</x-admin.resource>
@endsection