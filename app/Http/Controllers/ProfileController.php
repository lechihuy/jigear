<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Requests\ChangePasswordRequest;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function store(StoreProfileRequest $request)
    {
        auth()->user()->update($request->validated());

        $request->toast('success', __('Updated successfuly!'));

        return response()->noContent();
    }

    public function showChangePasswordForm()
    {
        return view('change-password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        auth()->user()->update([
            'password' => bcrypt($request->password)
        ]);

        $request->toast('success', __('Updated successfuly!'));

        return response()->noContent();
    }

    public function showDeliveryAddresses()
    {
        return view('delivery-address', [
            'deliveryAddresses' => auth()->user()->deliveryAddresses,
        ]);
    }

    public function createDeliveryAddress()
    {
        return view('create-delivery-address');
    }

    public function storeDeliveryAddress(StoreAddressRequest $request)
    {
        $user = auth()->user();
        $deliveryAddress = $user->deliveryAddresses()->create($request->validated());

        $request->toast('success', __('Created successfuly!'));

        return response()->json([
            'user' => $user,
            'delivery_address' => $deliveryAddress
        ]);
    }

    public function editDeliveryAddress($id)
    {
        $user = auth()->user();
        $deliveryAddress = $user->deliveryAddresses()->findOrFail($id);

        return view('edit-delivery-address', [
            'deliveryAddress' => $deliveryAddress,
        ]);
    }

    public function updateDeliveryAddress(UpdateAddressRequest $request, $id)
    {
        $user = auth()->user();
        $deliveryAddress = $user->deliveryAddresses()->findOrFail($id);
        $deliveryAddress->update($request->validated());
        
        $request->toast('success', __('Updated successfuly!'));

        return response()->json([
            'user' => $user,
            'delivery_address' => $deliveryAddress
        ]);
    }

    public function deleteDeliveryAddress(Request $request, $id)
    {
        $user = auth()->user();
        $deliveryAddress = $user->deliveryAddresses()->findOrFail($id);
        $deliveryAddress->delete();

        $request->toast('success', __('Deleted successfuly!'));

        return response()->noContent();
    }

    public function showOrders(Request $request)
    {
        $orders = auth()->user()->orders;

        return view('orders', ['orders' => $orders]);
    }

    public function showOrderDetail($id)
    {
        $order = auth()->user()->orders()->findOrFail($id);
        return view('order-detail', ['order' => $order]);
    }

    public function cancelOrder(Request $request, $id)
    {
        $user = auth()->user();
        $order = $user->orders()->findOrFail($id);

        if ($order->status == 'pending') {
            $order->update(['status' => 'canceled']);
        }

        $request->toast('success', __('Canceled successfuly!'));

        return back();
    }
}
