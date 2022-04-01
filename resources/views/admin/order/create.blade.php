@extends('admin.layouts.app')

@php
$title = __('Tạo đơn hàng');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="createOrderForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- Customer ID --}}
        <x-admin.panel.item label="Khách hàng">
            <x-admin.form.select name="customer_id" x-model="customer_id" :options="$userOptions" />
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.orders.index')" />
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
        Alpine.data('createOrderForm', () => ({
            customer_id: '', 
            first_name: '', 
            last_name: '', 
            gender: '0',
            phone_number: '', 
            address: '', 
            loading: false,
            submit() {
                this.loading = true;

                axios.post(route('admin.orders.store'), {
                    title: this.title, 
                    customer_id: this.customer_id
                }).then(res => {
                    window.location.href = route('admin.orders.show', {
                        order: res.data.order.id
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
