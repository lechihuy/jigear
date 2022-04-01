@extends('admin.layouts.app')

@php
    $title = __('Sửa người dùng');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="editUserForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- ID --}}
        <x-admin.panel.item label="ID">
            <x-admin.detail.text :value="$user->id" />
        </x-admin.panel.item>

        {{-- Email --}}
        <x-admin.panel.item label="Email" :required="true">
            <x-admin.form.text name="email" x-model="email" />
        </x-admin.panel.item>

        {{-- Role --}}
        <x-admin.panel.item label="Quyền" :required="true">
            <x-admin.form.select 
                name="role" 
                x-model="role" 
                :options="[
                  'Quản trị viên' => 'admin',
                  'Người dùng' => 'customer',
                ]" 
                :required="true"
            />
        </x-admin.panel.item>

        {{-- First name --}}
        <x-admin.panel.item label="Họ" :required="true">
            <x-admin.form.text name="first_name" x-model="first_name" />
        </x-admin.panel.item>

        {{-- Last name --}}
        <x-admin.panel.item label="Tên" :required="true">
            <x-admin.form.text name="last_name" x-model="last_name" />
        </x-admin.panel.item>

        {{-- Gender --}}
        <x-admin.panel.item label="Giới tính" :required="true">
            <x-admin.form.select 
                name="gender" 
                x-model="gender" 
                :options="[
                  'Nam' => 0,
                  'Nữ' => 1,
                  'Khác' => 2,
                ]" 
                :required="true"
            />
        </x-admin.panel.item>

        {{-- Email verified at --}}
        <x-admin.panel.item label="Xác minh">
            <x-admin.form.boolean name="email_verified_at" x-model="email_verified_at" />
        </x-admin.panel.item>

        {{-- # Change password --}}
        <x-admin.panel.heading value="Đổi mật khẩu" />
        
        {{-- Password --}}
        <x-admin.panel.item label="Mật khẩu mới">
            <x-admin.form.text name="password" x-model="password" />
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.users.show', [$user])" />
        </div>

        <div class="flex items-center gap-2 ml-auto">
            <x-admin.button.delete prefixRoute="admin.users." :resource="$user" />
            <x-admin.button.confirm-update />
        </div>
    </div>
    {{-- /Action buttons --}}
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('editUserForm', () => ({
        email: '{{ $user->email }}',
        first_name: '{{ $user->first_name }}',
        last_name: '{{ $user->last_name }}',
        password: '',
        gender: '{{ $user->gender }}',
        role: '{{ $user->role }}',
        email_verified_at: {{ $user->email_verified_at ? 'true' : 'false' }},
        loading: false,
        submit() {
            this.loading = true;
            
            axios.put(route('admin.users.update', { user: '{{ $user->id }}' }), {
                email: this.email,
                first_name: this.first_name,
                last_name: this.last_name,
                password: this.password,
                gender: this.gender,
                role: this.role,
                email_verified_at: this.email_verified_at,
            }).then(res => {
                window.location.href = route('admin.users.show', { user: res.data.user.id });
            }).catch(err => {
                Alpine.store('toast').show('danger', err.response.data.message)
            }).finally(() => {
                this.loading = false;
            });
        }
    }));
});
</script>
@endpush
