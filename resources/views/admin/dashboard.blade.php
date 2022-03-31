@extends('admin.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="mb-3">
        <h1 class="text-2xl text-gray-700">{{ __('Đơn hàng') }}</h1>
    </div>

    <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">
        <x-admin.card.counter route="admin.statistics.orders.total" :hasTrend="true" label="Tổng đơn hàng" />
        <x-admin.card.counter route="admin.statistics.orders.revenue" :hasTrend="true" label="Doanh thu" />
        <x-admin.card.classify route="admin.statistics.orders.status" label="Trạng thái đơn hàng" />
    </div>

    <div class="mb-3 mt-7">
        <h1 class="text-2xl text-gray-700">{{ __('Sản phẩm') }}</h1>
    </div>

    <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">
        <x-admin.card.counter route="admin.statistics.products.total" label="Tổng sản phẩm" />
        <x-admin.card.classify route="admin.statistics.products.status" label="Trạng thái sản phẩm" />
        <x-admin.card.classify route="admin.statistics.products.stock" label="Tình trạng kho hàng" />
    </div>

    <div class="mb-3 mt-7">
        <h1 class="text-2xl text-gray-700">{{ __('Người dùng') }}</h1>
    </div>

    <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">
        <x-admin.card.counter route="admin.statistics.users.total" label="Tổng người dùng" />
        <x-admin.card.classify route="admin.statistics.users.role" label="Nhóm người dùng" />
        <x-admin.card.counter route="admin.statistics.users.ordered" label="Số khách đã đặt hàng" />
    </div>
@endsection