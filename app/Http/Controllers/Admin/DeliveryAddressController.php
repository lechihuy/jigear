<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProductParameterSet;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductParameterRequest;
use App\Http\Requests\Admin\UpdateProductParameterRequest;

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
     * @param  App\Http\Requests\Admin\StoreProductParameterRequest  $request
     * @param  int  $productParameterSetId
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductParameterRequest $request, $productParameterSetId)
    {
        $productParameterSet = ProductParameterSet::findOrFail($productParameterSetId);
        $parameter = $productParameterSet->parameters()->create($request->validated());

        $request->toast('success', __('Tạo thông số sản phẩm thành công!'));

        return response()->json([
            'product_parameter_set' => $productParameterSet,
            'parameter' => $parameter
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $productParameterSetId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($productParameterSetId, $id)
    {
        $productParameterSet = ProductParameterSet::findOrFail($productParameterSetId);
        $parameter = $productParameterSet->parameters()->findOrFail($id);
        $productParameterSetDetailUrl = route('admin.product-parameter-sets.show', [$productParameterSetId]);

        return view('admin.product-parameter-set.parameter.detail', [
            'productParameterSet' => $productParameterSet,
            'parameter' => $parameter,
            'productParameterSetDetailUrl' => $productParameterSetDetailUrl,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $productParameterSetId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($productParameterSetId, $id)
    {
        $productParameterSet = ProductParameterSet::findOrFail($productParameterSetId);
        $parameter = $productParameterSet->parameters()->findOrFail($id);
        $productParameterSetDetailUrl = route('admin.product-parameter-sets.show', [$productParameterSetId]);

        return view('admin.product-parameter-set.parameter.edit', [
            'productParameterSet' => $productParameterSet,
            'parameter' => $parameter,
            'productParameterSetDetailUrl' => $productParameterSetDetailUrl,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateProductParameterRequest  $request
     * @param  int  $productParameterSetId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductParameterRequest $request, $productParameterSetId, $id)
    {
        $productParameterSet = ProductParameterSet::findOrFail($productParameterSetId);
        $parameter = $productParameterSet->parameters()->findOrFail($id);
        $parameter->update($request->validated());
        
        $request->toast('success', __('Cập nhật thông số sản phẩm thành công!'));

        return response()->json([
            'product_parameter_set' => $productParameterSet,
            'parameter' => $parameter
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Response  $request
     * @param  int  $productParameterSetId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $productParameterSetId, $id)
    {
        $productParameterSet = ProductParameterSet::findOrFail($productParameterSetId);
        $parameter = $productParameterSet->parameters()->findOrFail($id);
        $parameter->delete();

        $request->toast('success', __('Xóa thông số sản phẩm thành công!'));

        return response()->noContent();
    }
}
