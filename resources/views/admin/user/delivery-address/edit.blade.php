@extends('admin.layouts.app')

@php
    $title = __('Sửa địa chỉ giao hàng');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="editDeliveryAddressForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel 
        :name="$title"
        :parent="$user"
        :parentUrl="$userDetailUrl"
        parentDisplay="email"
        parentLabel="Người dùng"
    >

        {{-- ID --}}
        <x-admin.panel.item label="ID">
            <x-admin.detail.text :value="$deliveryAddress->id" />
        </x-admin.panel.item>

        {{-- Address --}}
        <x-admin.panel.item label="Địa chỉ">
            <x-admin.form.text name="address" x-model="address" />
        </x-admin.panel.item>

        {{-- Phone number --}}
        <x-admin.panel.item label="Số điện thoại">
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
            <x-admin.button.cancel :url="route('admin.users.delivery-addresses.show', [$user, $deliveryAddress])" />
        </div>

        <div class="flex items-center gap-2 ml-auto">
            <x-admin.button.delete 
                prefixRoute="admin.users.delivery-addresses." 
                :resource="$deliveryAddress" 
                :parent="$user"
            />
            <x-admin.button.confirm-update />
        </div>
    </div>
    {{-- /Action buttons --}}
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('editDeliveryAddressForm', () => ({
        address: '{{ $deliveryAddress->address }}',
        phone_number: '{{ $deliveryAddress->phone_number }}',
        is_default: {{ $deliveryAddress->is_default ? 'true' : 'false' }},
        loading: false,
        submit() {
            this.loading = true;
            
            axios.put(route('admin.users.delivery-addresses.update', { 
                user: '{{ $user->id }}',
                delivery_address: '{{ $deliveryAddress->id }}',
            }), {
                address: this.address,
                phone_number: this.phone_number,
                is_default: this.is_default,
            }).then(res => {
                window.location.href = route('admin.users.delivery-addresses.show', { 
                    user: res.data.user.id,
                    delivery_address: res.data.delivery_address.id, 
                });
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
