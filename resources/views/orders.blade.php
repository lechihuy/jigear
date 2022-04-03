@extends('layouts.profile')
@section('title', 'Orders' . ' - ' .config('app.name'))
@section('box')
<div class="relative overflow-x-auto grow">
    <div>
        <p class="font-medium text-3xl pb-4">My Order</p>
    </div>
    <table class="w-full text-sm text-left mt-9">
        <thead class="text-sm font-medium bg-gray-50">
            <tr>
                <td class="px-6 py-3">
                    #
                </td>
                <td class="px-6 py-3">
                    State
                </td>
                <td class="px-6 py-3">
                    Total bill
                </td>
                <td class="px-6 py-3">
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr class="bg-white border-b dark:border-gray-700">
                <th class="px-6 py-4 font-medium whitespace-nowrap">
                    {{ $order->code }}
                </th>
                <td class="px-6 py-4">
                    @if ($order->status == 'pending')
                        <button class="px-1 py-0.5 w-20 text-center text-yellow-900 rounded-lg bg-yellow-100 text-xs">Pending</button>
                    @elseif ($order->status == 'delivering')
                        <button class="px-1 py-0.5 w-20 text-center text-blue-900 rounded-lg bg-blue-100 text-xs">Delivering</button>
                    @elseif ($order->status == 'succeed')
                    <button class="px-1 py-0.5 w-20 text-center text-green-900 rounded-lg bg-green-100 text-xs">Succeed</button>
                    @elseif ($order->status == 'canceled')
                        <button class="px-1 py-0.5 w-20 text-center text-gray-900 rounded-lg bg-gray-100 text-xs">Canceled</button>
                    @endif
                </td>
                <td class="px-6 py-4">
                    {{ price_text($order->total) }}
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('profile.orders.show', $order->id) }}" class="text-zinc-500 hover:underline">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection