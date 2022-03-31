@extends('admin.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="mb-3">
        <h1 class="text-2xl text-gray-700">{{ __('Đơn hàng') }}</h1>
    </div>

    <div class="grid grid-cols-3 gap-5">
        <x-admin.card.counter route="admin.statistics.orders.total" label="Tổng đơn hàng" />
        <x-admin.card.counter route="admin.statistics.orders.revenue" label="Doanh thu" />
    </div>

    <div class="mb-3 mt-7">
        <h1 class="text-2xl text-gray-700">{{ __('Sản phẩm') }}</h1>
    </div>
@endsection