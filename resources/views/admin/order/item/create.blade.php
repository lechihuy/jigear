@extends('admin.layouts.app')

@php
    $title = __('Tạo mục đơn hàng');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="createOrderItemForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel 
        :name="$title"
        :parent="$order"
        :parentUrl="$orderDetailUrl"
        parentDisplay="code"
        parentLabel="Đơn hàng"
    >

        {{-- Product Id --}}
        <x-admin.panel.item label="Sản phẩm" :required="true">
            <x-admin.form.select name="product_id" x-model="product_id" :options="$productOptions" />
        </x-admin.panel.item>

        {{-- Quantity --}}
        <x-admin.panel.item label="Số lượng" :required="true">
            <x-admin.form.number name="qty" x-model="qty" />
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.orders.items.index', [$order])" />
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
  Alpine.data('createOrderItemForm', () => ({
    product_id: '',
    qty: 1,
    loading: false,
    submit() {
        this.loading = true;

        axios.post(route('admin.orders.items.store', { 
            order: {{ $order->id }} 
        }), {
            product_id: this.product_id,
            qty: this.qty,
        }).then(res => {
            window.location.href = route('admin.orders.items.show', { 
                order: res.data.order.id,
                item: res.data.item.id 
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
