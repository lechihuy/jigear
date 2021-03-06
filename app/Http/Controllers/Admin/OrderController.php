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
            $orders->where('code', 'like', "%$q%")
                ->orWhere('first_name', 'like', "%$q%")
                ->orWhere('last_name', 'like', "%$q%")
                ->orWhere('phone_number', 'like', "%$q%")
                ->orWhereFullText('address', $q)
                ->orWhere('address', 'like', "%$q%");
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

        $request->toast('success', __('T???o ????n h??ng th??nh c??ng!'));

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

        $request->toast('success', __('C???p nh???t ????n h??ng th??nh c??ng!'));

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

        $request->toast('success', __('X??a ????n h??ng th??nh c??ng!'));

        return response()->noContent();
    }

    public function statisticTotalOrder(Request $request) 
    {
        $counter = match ($request->period) {
            'today' => Order::whereDate('created_at', Carbon::today())->count(),
            'this-month' => Order::whereYear('created_at', Carbon::now())->whereMonth('created_at', Carbon::now())->count(),
            'this-year' => Order::whereYear('created_at', Carbon::now())->count(),
            'all' => Order::count(),
        };

        $trend = match ($request->period) {
            'today' => calculate_trend(
                Order::whereDate('created_at', Carbon::today())->count(),
                Order::whereDate('created_at', Carbon::yesterday())->count(),
            ),
            'this-month' => calculate_trend(
                Order::whereYear('created_at', Carbon::now())->whereMonth('created_at', Carbon::now())->count(),
                Order::whereYear('created_at', Carbon::now())->whereMonth('created_at', Carbon::now()->startOfMonth()->subMonth())->count(),
            ),
            'this-year' => calculate_trend(
                Order::whereYear('created_at', Carbon::now())->count(),
                Order::whereYear('created_at', Carbon::now()->subYear())->count(),
            ),
            'all' => ['+', 0],
        };

        return response()->json([
            'counter' => $counter,
            'trend' => $trend
        ]);
    }

    public function statisticRevenue(Request $request) 
    {
        $counter = match ($request->period) {
            'today' => Order::whereDate('created_at', Carbon::today())->where('status', 'succeed')->sum('total'),
            'this-month' => Order::whereYear('created_at', Carbon::now())
                ->whereMonth('created_at', Carbon::now())
                ->where('status', 'succeed')
                ->sum('total'),
            'this-year' => Order::whereYear('created_at', Carbon::now())->where('status', 'succeed')->sum('total'),
            'all' => Order::where('status', 'succeed')->sum('total'),
        };

        $trend = match ($request->period) {
            'today' => calculate_trend(
                Order::whereDate('created_at', Carbon::today())->where('status', 'succeed')->sum('total'),
                Order::whereDate('created_at', Carbon::yesterday())->where('status', 'succeed')->sum('total'),
            ),
            'this-month' => calculate_trend(
                Order::whereYear('created_at', Carbon::now())->whereMonth('created_at', Carbon::now())->where('status', 'succeed')->sum('total'),
                Order::whereYear('created_at', Carbon::now())->whereMonth('created_at', Carbon::now()->startOfMonth()->subMonth())->where('status', 'succeed')->sum('total'),
            ),
            'this-year' => calculate_trend(
                Order::whereYear('created_at', Carbon::now())->where('status', 'succeed')->sum('total'),
                Order::whereYear('created_at', Carbon::now()->subYear())->where('status', 'succeed')->sum('total'),
            ),
            'all' => ['+', 0],
        };

        return response()->json([
            'counter' => option('currency') . number_format($counter, 0),
            'trend' => $trend
        ]);
    }

    public function statisticOrderStatus(Request $request)
    {
        return response()->json([
            'labels' => [
                [
                    'name' => __('??ang ?????i duy???t'),
                    'class' => 'bg-yellow-100',
                    'counter' => Order::where('status', 'pending')->count(),
                ],
                [
                    'name' => __('??ang giao'),
                    'class' => 'bg-sky-100',
                    'counter' => Order::where('status', 'delivering')->count(),
                ],
                [
                    'name' => __('th??nh c??ng'),
                    'class' => 'bg-green-100',
                    'counter' => Order::where('status', 'succeed')->count(),
                ],
                [
                    'name' => __('???? h???y'),
                    'class' => 'bg-gray-100',
                    'counter' => Order::where('status', 'canceled')->count(),
                ]
            ]
        ]);
    }
}
