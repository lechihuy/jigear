<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOrderRequest;

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
