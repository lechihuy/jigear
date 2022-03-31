<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOrderItemRequest;
use App\Http\Requests\Admin\UpdateOrderItemRequest;

class OrderItemController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $orderId
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $orderDetailUrl = route('admin.orders.show', [$orderId]);
        
        $perPage = $request->input('per_page', 15);
        $hasFilter = $request->hasAny(['q', 'per_page']);
        $hasSort = $request->hasAny(['sort-id', 'sort-qty', 'sort-unit_price']);
        
        if (!$hasSort) {
            return redirect($request->fullUrlWithQuery(['sort-id' => 'desc']));
        }

        $items = $order->items();

        // Filter
        $request->whenHas('q', function ($q) use ($items) {
            $items->whereHas('product', function($query) use ($q) {
                return $query->where('title', 'like', "%$q%")
                    ->orWhereFullText('title', $q)
                    ->orWhere('sku', 'like', "%$q%");
            })->orWhere('unit_price', 'like', "%$q%");;
        });

        // Sorting
        $request->whenHas('sort-id', function($sorting) use ($items) {
            $items->orderBy('id', $sorting);
        });

        $request->whenHas('sort-unit_price', function($unitPrice) use ($items) {
            $items->orderBy('unit_price', $unitPrice);
        });

        $request->whenHas('sort-qty', function($qty) use ($items) {
            $items->orderBy('qty', $qty);
        });
        
        $items = $items->paginate(15)->withQueryString();

        return view('admin.order.item.index', [
            'order' => $order,
            'items' => $items,
            'hasItems' => $order->items()->exists(),
            'hasFilter' => $hasFilter,
            'orderDetailUrl' => $orderDetailUrl,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $orderId
     * @return \Illuminate\Http\Response
     */
    public function create($orderId)
    {
        $order = Order::findOrFail($orderId);
        $orderDetailUrl = route('admin.orders.show', [$order]);

        return view('admin.order.item.create', [
            'order' => $order,
            'orderDetailUrl' => $orderDetailUrl,
            'productOptions' => Product::inStock()->get()->mapWithKeys(fn($product) => [
                $product->title => $product->id
            ])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\StoreOrderItemRequest  $request
     * @param  int  $orderId
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderItemRequest $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order->items()->where('product_id', $request->product_id)->exists()) {
            $item = $order->items()->where('product_id', $request->product_id)->first();
            $item->addQuantity($request->qty);
        } else {
            $item = $order->items()->create($request->validated());
        }

        $order->calculateBill();
        $order->save();

        $request->toast('success', __('Tạo mục đơn hàng thành công!'));

        return response()->json([
            'order' => $order,
            'item' => $item
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $orderId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($orderId, $id)
    {
        $order = Order::findOrFail($orderId);
        $item = $order->items()->findOrFail($id);
        $orderDetailUrl = route('admin.orders.show', [$orderId]);

        return view('admin.order.item.detail', [
            'order' => $order,
            'item' => $item,
            'orderDetailUrl' => $orderDetailUrl,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $orderId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($orderId, $id)
    {
        $order = Order::findOrFail($orderId);
        $item = $order->items()->findOrFail($id);
        $orderDetailUrl = route('admin.orders.show', [$orderId]);

        return view('admin.order.item.edit', [
            'order' => $order,
            'item' => $item,
            'orderDetailUrl' => $orderDetailUrl,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateOrderItemRequest  $request
     * @param  int  $orderId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderItemRequest $request, $orderId, $id)
    {
        $order = Order::findOrFail($orderId);
        $item = $order->items()->findOrFail($id);
        $item->changeQuantity($request->qty);
        
        $order->calculateBill();
        $order->save();

        $request->toast('success', __('Cập nhật mục đơn hàng thành công!'));

        return response()->json([
            'order' => $order,
            'item' => $item,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $orderId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $orderId, $id)
    {
        $order = Order::findOrFail($orderId);
        $item = $order->items()->findOrFail($id);
        $item->delete();

        $order->calculateBill();
        $order->save();

        $request->toast('success', __('Xóa mục đơn hàng thành công!'));

        return response()->noContent();
    }
}
