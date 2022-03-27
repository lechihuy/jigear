@extends('admin.layouts.app')

@php
    $title = __('Tạo địa chỉ giao hàng');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="createDeliveryAddressForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel 
        :name="$title"
        :parent="$user"
        :parentUrl="$userDetailUrl"
        parentDisplay="key"
        parentLabel="Người dùng"
    >

        {{-- Address --}}
        <x-admin.panel.item label="Địa chỉ" :required="true">
            <x-admin.form.text name="address" x-model="address" />
        </x-admin.panel.item>

        {{-- Phone number --}}
        <x-admin.panel.item label="Số điện thoại" :required="true">
            <x-admin.form.text name="phone_number" x-model="phone_number" />
        </x-admin.panel.item>

        {{-- Is default --}}
        <x-admin.panel.item label="Mặc định">
            <x-admin.form.boolean name="is_default" x-model="is_default" />
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.users.delivery-addresses.index', [$user])" />
        </div>

        <div class="ml-auto">
            <x-admin.button.confirm-creation />
        </div>
    </div>
    {{-- /Action buttons --}}
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('createDeliveryAddressForm', () => ({
    address: '',
    phone_number: '',
    is_default: false,
    loading: false,
    submit() {
        this.loading = true;

        axios.post(route('admin.users.delivery-addresses.store', { 
            user: {{ $user->id }} 
        }), {
            address: this.address,
            phone_number: this.phone_number
        }).then(res => {
            window.location.href = route('admin.users.delivery-addresses.show', { 
                user: res.data.user.id,
                delivery_address: res.data.delivery_address.id 
            });
        }).catch(err => {
            Alpine.store('toast').show('danger', err.response.data.message)
        }).finally(() => {
            this.loading = false;
        })
    }
  }));
});
</script>
@endpush
