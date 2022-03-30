<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DeliveryAddress;
use App\Models\ProductParameterSet;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDeliveryAddressRequest;
use App\Http\Requests\Admin\UpdateDeliveryAddressRequest;

class DeliveryAddressController extends Controller
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
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $userDetailUrl = route('admin.users.show', [$userId]);
        
        $perPage = $request->input('per_page', 15);
        $hasFilter = $request->hasAny(['q', 'per_page']);
        $hasSort = $request->hasAny(['sort-id', 'sort-address', 'sort-phone_number']);
        
        if (!$hasSort) {
            return redirect($request->fullUrlWithQuery(['sort-id' => 'desc']));
        }

        $deliveryAddresses = $user->deliveryAddresses();

        // Filter
        $request->whenHas('q', function ($q) use ($deliveryAddresses) {
            $deliveryAddresses->where(function($query) use ($q) {
                $query->where('address', 'like', "%$q%")->orWhereFullText('address', $q)
                    ->orWhere('phone_number', 'like', "%$q%");
            });
        });

        $request->whenHas('is_default', function($isDefault) use ($deliveryAddresses) {
            $deliveryAddresses->where('is_default', $isDefault);
        });
        
        // Sorting
        $request->whenHas('sort-id', function($sorting) use ($deliveryAddresses) {
            $deliveryAddresses->orderBy('id', $sorting);
        });

        $request->whenHas('sort-address', function($sorting) use ($deliveryAddresses) {
            $deliveryAddresses->orderBy('address', $sorting);
        });

        $request->whenHas('sort-phone_number', function($sorting) use ($deliveryAddresses) {
            $deliveryAddresses->orderBy('phone_number', $sorting);
        });
        
        $deliveryAddresses = $deliveryAddresses->paginate(15)->withQueryString();

        return view('admin.user.delivery-address.index', [
            'user' => $user,
            'deliveryAddresses' => $deliveryAddresses,
            'hasDeliveryAddresses' => $user->deliveryAddresses()->exists(),
            'hasFilter' => $hasFilter,
            'userDetailUrl' => $userDetailUrl,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function create($user)
    {
        $user = User::findOrFail($user);
        $userDetailUrl = route('admin.users.show', [$user]);

        return view('admin.user.delivery-address.create', [
            'user' => $user,
            'userDetailUrl' => $userDetailUrl,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\StoreDeliveryAddressRequest  $request
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryAddressRequest $request, $userId)
    {
        $user = User::findOrFail($userId);
        $deliveryAddress = $user->deliveryAddresses()->create($request->validated());

        $request->toast('success', __('Tạo địa chỉ giao hàng thành công!'));

        return response()->json([
            'user' => $user,
            'delivery_address' => $deliveryAddress
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $userId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId, $id)
    {
        $user = User::findOrFail($userId);
        $deliveryAddress = $user->deliveryAddresses()->findOrFail($id);
        $userDetailUrl = route('admin.users.show', [$userId]);

        return view('admin.user.delivery-address.detail', [
            'user' => $user,
            'deliveryAddress' => $deliveryAddress,
            'userDetailUrl' => $userDetailUrl,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $userId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($userId, $id)
    {
        $user = User::findOrFail($userId);
        $deliveryAddress = $user->deliveryAddresses()->findOrFail($id);
        $userDetailUrl = route('admin.users.show', [$userId]);

        return view('admin.user.delivery-address.edit', [
            'user' => $user,
            'deliveryAddress' => $deliveryAddress,
            'userDetailUrl' => $userDetailUrl,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateDeliveryAddressRequest  $request
     * @param  int  $userId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryAddressRequest $request, $userId, $id)
    {
        $user = User::findOrFail($userId);
        $deliveryAddress = $user->deliveryAddresses()->findOrFail($id);
        $deliveryAddress->update($request->validated());
        
        $request->toast('success', __('Cập nhật địa chỉ giao hàng thành công!'));

        return response()->json([
            'user' => $user,
            'delivery_address' => $deliveryAddress
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Response  $request
     * @param  int  $userId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $userId, $id)
    {
        $user = User::findOrFail($userId);
        $deliveryAddress = $user->deliveryAddresses()->findOrFail($id);
        $parameter->delete();

        $request->toast('success', __('Xóa địa chỉ giao hàng thành công!'));

        return response()->noContent();
    }
}
