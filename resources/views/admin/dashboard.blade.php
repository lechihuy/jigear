@extends('admin.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="mb-3">
        <h1 class="text-2xl text-gray-700">{{ __('Đơn hàng') }}</h1>
    </div>

    <div class="grid grid-cols-3 gap-5">
        <x-admin.card.counter 
            label="Tổng đơn hàng"
            counter="89"
            trend="+0.12"
        />
        <div class="bg-white">2</div>
        <div class="bg-white">3</div>
    </div>
@endsection