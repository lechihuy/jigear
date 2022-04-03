<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller
{
    public function showCheckoutForm()
    {
        $defaultDeliveryAddress = optional(auth_customer())->deliveryAddresses?->where('is_default', 1)?->first();
        $subTotal = collect(cart())->sum(function($item) {
            return $item['qty'] * Product::find($item['id'])->unit_price;
        });
        $total = option('shipping_fee') + $subTotal;

        return view('checkout', [
            'deliveryAddresses' => optional(auth_customer())->deliveryAddresses ?? [],
            'defaultDeliveryAddress' => $defaultDeliveryAddress 
                                            ? $defaultDeliveryAddress->address.'||'.$defaultDeliveryAddress->phone_number
                                            : '',
            'subTotal' => $subTotal,
            'total' => $total,
        ]);
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->validated();
        $order = new Order;
        $order->customer_id = $data['customer_id'];
        $order->fill($data);
        $order->calculateBill();
        $order->save();

        $order->items()->createMany(collect(cart())->map(function($item) {
            return [
                'product_id' => $item['id'],
                'qty' => $item['qty'],
            ];
        })->all());

        $order = Order::find($order->id);
        $order->calculateBill();
        $order->save();

        $request->toast('success', __('Checkout order successfully!'));

        return response()->json(['order' => $order])->withCookie(cookie('cart', '[]', 60 * 24 * 30));
    }
}
