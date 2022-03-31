<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOrderRequest;
use App\Http\Requests\Admin\UpdateOrderRequest;

class OrderController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 15);
        $hasFilter = $request->hasAny(['q', 'per_page']);
        $hasSort = $request->hasAny(['sort-id']);

        if (!$hasSort) {
            return redirect($request->fullUrlWithQuery(['sort-id' => 'desc']));
        }

        $orders = Order::query();

        // Filter
        $request->whenHas('q', function ($q) use ($orders) {
            $orders->where('code', 'like', "%$q%");
        });

        $request->whenHas('status', function($status) use ($orders) {
            $orders->where('status', $status);
        });

        $request->whenHas('customer_id', function($customerId) use ($orders) {
            $orders->where('customer_id', $customerId);
        });

        // Sorting
        $request->whenHas('sort-id', function($sorting) use ($orders) {
            $orders->orderBy('id', $sorting);
        });

        $orders = $orders->paginate($perPage)->withQueryString();

        return view('admin.order.index', [
            'orders' => $orders,
            'hasOrders' => Order::exists(),
            'hasFilter' => $hasFilter,
            'userOptions' => User::where('role', 'customer')->get()->mapWithKeys(fn($user) => [
                $user->email => $user->id
            ])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order.create', [
            'userOptions' => User::where('role', 'customer')->get()->mapWithKeys(fn($user) => [
                $user->email => $user->id
            ])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();
        $order = new Order;
        $order->customer_id = $data['customer_id'];

        // Auto get customer information
        if ($order->customer_id) {
            $order->email = $order->customer->email;
            $order->first_name = $order->customer->first_name;
            $order->last_name = $order->customer->last_name;
            $order->gender = $order->customer->gender;
        }

        $order->calculateBill();
        $order->save();

        $request->toast('success', __('Tạo đơn hàng thành công!'));

        return response()->json(['order' => $order]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.order.detail', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.order.edit', [
            'order' => $order,
            'deliveryAddressOptions' => optional(optional($order->customer)->deliveryAddresses)->mapWithKeys(fn($deliveryAddress) => [
                $deliveryAddress->address . ' &mdash; ' . $deliveryAddress->phone_number => $deliveryAddress->address . '||' . $deliveryAddress->phone_number
            ])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateOrderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $data = $request->validated();

        $order->fill($data);
        $order->calculateBill(['shipping_fee' => $data['shipping_fee']]);
        $order->save();

        $request->toast('success', __('Cập nhật đơn hàng thành công!'));

        return response()->json(['order' => $order]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        $request->toast('success', __('Xóa đơn hàng thành công!'));

        return response()->noContent();
    }

    public function statisticTotalOrder(Request $request) 
    {
        $counter = match ($request->period) {
            'today' => Order::whereDate('created_at', Carbon::today())->count(),
            'this-month' => Order::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count(),
            'this-year' => Order::whereYear('created_at', Carbon::now())->count(),
            'all' => Order::count(),
        };

        return response()->json([
            'counter' => $counter,
        ]);
    }

    public function statisticRevenue(Request $request) 
    {
        $counter = match ($request->period) {
            'today' => Order::whereDate('created_at', Carbon::today())->where('status', 'succeed')->sum('total'),
            'this-month' => Order::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where('status', 'succeed')
                ->sum('total'),
            'this-year' => Order::whereYear('created_at', Carbon::now())->where('status', 'succeed')->sum('total'),
            'all' => Order::where('status', 'succeed')->sum('total'),
        };

        return response()->json([
            'counter' => option('currency') . number_format($counter, 0),
        ]);
    }
}
