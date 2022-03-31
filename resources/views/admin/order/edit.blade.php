@extends('admin.layouts.app')

@php
    $title = __('Sửa đơn hàng');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="editOrderForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- ID --}}
        <x-admin.panel.item label="ID">
            <x-admin.detail.text :value="$order->id" />
        </x-admin.panel.item>

        {{-- Code --}}
        <x-admin.panel.item label="Mã">
            <x-admin.detail.code :value="$order->code" />
        </x-admin.panel.item>

        {{-- Status --}}
        <x-admin.panel.item label="Trạng thái" :required="true">
            <x-admin.form.select 
                name="status" 
                x-model="status" 
                :options="[
                    'Đang đợi duyệt' => 'pending',
                    'Đang giao' => 'delivering',
                    'Thành công' => 'succeed',
                    'Đã hủy' => 'canceled'
                ]" 
                :required="true"
            />
        </x-admin.panel.item>

        {{-- # Customer information --}}
        <x-admin.panel.heading value="Thông tin khách hàng" />

        {{-- Customer ID --}}
        <x-admin.panel.item label="Khách hàng">
            <x-admin.detail.belongs-to 
                :owner="$order->customer" 
                prefixRouteName="admin.users."
                display="email" 
            />
        </x-admin.panel.item>

        {{-- Email --}}
        <x-admin.panel.item label="Email" :required="true">
            <x-admin.form.text name="email" x-model="email" />
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

        {{-- # Delivery address --}}
        <x-admin.panel.heading value="Địa chỉ giao hàng" />
        @if ($order->customer_id && $order->customer->deliveryAddresses->count())
            <div class="bg-white p-7">
                <span class="block mb-2 text-sm text-gray-700">{{ __('Chọn địa chỉ giao hàng có sẵn') }}</span>
                <x-admin.form.select 
                    name="deliveryAddress" 
                    x-model="deliveryAddress" 
                    :options="$deliveryAddressOptions" 
                    @change="setDeliveryAddress"
                />
            </div>
        @endif
        
        {{-- Address --}}
        <x-admin.panel.item label="Địa chỉ" :required="true">
            <x-admin.form.text name="address" x-model="address" />
        </x-admin.panel.item>
    
        {{-- Phone number --}}
        <x-admin.panel.item label="Số điện thoại" :required="true">
            <x-admin.form.text name="phone_number" x-model="phone_number" />
        </x-admin.panel.item>

        {{-- # Bill information --}}
        <x-admin.panel.heading value="Thông tin thanh toán" />

        <x-admin.panel.item label="Phí vận chuyển">
            <x-admin.form.currency name="shipping_fee" x-model="shipping_fee" />
        </x-admin.panel.item>
        
    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.orders.show', [$order])" />
        </div>

        <div class="flex items-center gap-2 ml-auto">
            <x-admin.button.delete prefixRoute="admin.orders." :resource="$order" />
            <x-admin.button.confirm-update />
        </div>
    </div>
    {{-- /Action buttons --}}
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('editOrderForm', () => ({
        status: '{{ $order->status }}',
        email: '{{ $order->email }}',
        first_name: '{{ $order->first_name }}',
        last_name: '{{ $order->last_name }}',
        gender: '{{ $order->gender }}',
        deliveryAddress: '',
        address: '{{ $order->address }}',
        phone_number: '{{ $order->phone_number }}',
        shipping_fee: '{{ $order->shipping_fee }}',
        loading: false,
        setDeliveryAddress() {
            const deliveryAddress = this.deliveryAddress.split('||')
            this.address = deliveryAddress[0] ?? null
            this.phone_number = deliveryAddress[1] ?? null
        },
        submit() {
            this.loading = true;
            
            axios.put(route('admin.orders.update', { order: '{{ $order->id }}' }), {
                status: this.status,
                email: this.email,
                first_name: this.first_name,
                last_name: this.last_name,
                gender: this.gender,
                address: this.address,
                phone_number: this.phone_number,
                shipping_fee: this.shipping_fee,
            }).then(res => {
                window.location.href = route('admin.orders.show', { order: res.data.order.id });
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
