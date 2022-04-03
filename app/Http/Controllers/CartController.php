<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $cart = cart();

        $key = collect($cart)->search(function($item) use ($request) {
            return $item['id'] == $request->id;
        });

        if ($key === false) {
            array_push($cart, ['id' => $request->id, 'qty' => 1]);
        } else {
            $cart[$key]['qty'] += 1;
        }

        return response()->json([
            'message' => 'Add to cart successfully',
        ])->withCookie($this->updateCart($cart));
    }

    protected function updateCart($cart)
    {
        return cookie('cart', json_encode($cart), 60 * 24 * 30);
    }

    public function showCart()
    {
        $subTotal = collect(cart())->sum(function($item) {
            return $item['qty'] * Product::find($item['id'])->unit_price;
        });
        $total = option('shipping_fee') + $subTotal;

        return view('cart', compact('total', 'subTotal'));
    }

    public function updateQuantity(Request $request)
    {
        $cart = cart();
        $action = $request->action;

        $key = collect($cart)->search(function($item) use ($request) {
            return $item['id'] == $request->id;
        });

        if ($cart[$key]['qty'] == 1 && $action == 'minus') {
            unset($cart[$key]);
        } else if ($cart[$key]['qty'] >= 1) {
            $cart[$key]['qty'] += $action == 'plus' ? 1 : -1;
        } 

        $subTotal = collect($cart)->sum(function($item) {
            return $item['qty'] * Product::find($item['id'])->unit_price;
        });
        $total = option('shipping_fee') + $subTotal;

        return response()->json([
            'subTotal' => price_text($subTotal),
            'total' => price_text($total),
            'isEmpty' => !count($cart),
        ])->withCookie($this->updateCart($cart));
    }
}
