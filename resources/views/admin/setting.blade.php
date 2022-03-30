@extends('admin.layouts.app')
@php
    $title = __('Cài đặt');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="editSettingForm" @submit.prevent="submit">
    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- # Basic --}}
        <x-admin.panel.heading value="Cơ bản" />

        {{-- App name --}}
        <x-admin.panel.item label="Tên" :required="true">
            <x-admin.form.text name="app_name" x-model="app_name" />
        </x-admin.panel.item>

        {{-- # Store --}}
        <x-admin.panel.heading value="Cửa hàng" />

        {{-- Currency --}}
        <x-admin.panel.item label="Tiền tệ" :required="true">
            <x-admin.form.text name="currency" x-model="currency" />
        </x-admin.panel.item>

        {{-- Shipping fee --}}
        <x-admin.panel.item label="Phí vận chuyển" :required="true">
            <x-admin.form.currency name="shipping_fee" x-model="shipping_fee" min="0" />
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
        </div>

        <div class="flex items-center gap-2 ml-auto">
            <x-admin.button.confirm-update />
        </div>
    </div>
    {{-- /Action buttons --}}
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('editSettingForm', () => ({
        app_name: '{{ option("app_name") }}',
        shipping_fee: '{{ option("shipping_fee") }}',
        currency: '{{ option("currency") }}',
        loading: false,
        submit() {
            this.loading = true;
            let data = new FormData()

            data.append('_method', 'PUT')
            data.append('app_name', this.app_name)
            data.append('shipping_fee', this.shipping_fee)
            data.append('currency', this.currency)

            axios.post(route('admin.setting.update'), data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(res => {
                window.location.href = route('admin.setting');
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
