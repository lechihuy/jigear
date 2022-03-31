@extends('admin.layouts.app')

@php
    $title = __('Chi tiết mục đơn hàng');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="editOrderItemForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel 
        :name="$title"
        :parent="$order"
        :parentUrl="$orderDetailUrl"
        parentDisplay="code"
        parentLabel="Đơn hàng"
    >

        {{-- ID --}}
        <x-admin.panel.item label="ID">
            <x-admin.detail.text :value="$item->id" />
        </x-admin.panel.item>

        {{-- Thumbnail --}}
        <x-admin.panel.item label="Thumbnail">
            <x-admin.detail.thumbnail :value="optional($item->product->thumbnail)->url" />
        </x-admin.panel.item>

        {{-- Product --}}
        <x-admin.panel.item label="Sản phẩm">
            <x-admin.detail.belongs-to 
                :owner="$item->product" 
                prefixRouteName="admin.products."
                display="title" 
            />
        </x-admin.panel.item>
        
        {{-- Quantity --}}
        <x-admin.panel.item label="Số lượng">
            <x-admin.form.number name="qty" x-model="qty" />
        </x-admin.panel.item>
        
    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.orders.items.show', [$order, $item])" />
        </div>

        <div class="flex items-center gap-2 ml-auto">
            <x-admin.button.delete 
                prefixRoute="admin.orders.items." 
                :resource="$item" 
                :parent="$order"
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
    Alpine.data('editOrderItemForm', () => ({
        qty: '{{ $item->qty }}',
        loading: false,
        submit() {
            this.loading = true;
            
            axios.put(route('admin.orders.items.update', { 
                order: '{{ $order->id }}',
                item: '{{ $item->id }}',
            }), {
                qty: this.qty,
            }).then(res => {
                window.location.href = route('admin.orders.items.show', { 
                    order: res.data.order.id,
                    item: res.data.item.id, 
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
