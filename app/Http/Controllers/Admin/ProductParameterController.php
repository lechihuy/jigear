<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductParameterSet;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductParameterRequest;
use App\Http\Requests\Admin\UpdateProductParameterRequest;

class ProductParameterController extends Controller
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
     * @param  int  $productParameterSetId
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $productParameterSetId)
    {
        $productParameterSet = ProductParameterSet::findOrFail($productParameterSetId);
        $productParameterSetDetailUrl = route('admin.product-parameter-sets.show', [$productParameterSetId]);
        
        $perPage = $request->input('per_page', 15);
        $hasFilter = $request->hasAny(['q', 'key', 'per_page']);
        $hasSort = $request->hasAny(['sort-id', 'sort-key']);
        
        if (!$hasSort) {
            return redirect($request->fullUrlWithQuery(['sort-id' => 'desc']));
        }

        $parameters = $productParameterSet->parameters();

        // Filter
        $request->whenHas('q', function ($q) use ($parameters) {
            $parameters->where(function($query) use ($q) {
                $query->where('key', 'like', "%$q%")->orWhereFullText('key', $q);
            });
        });
        
        // Sorting
        $request->whenHas('sort-id', function($sorting) use ($parameters) {
            $parameters->orderBy('id', $sorting);
        });

        $request->whenHas('sort-key', function($sorting) use ($parameters) {
            $parameters->orderBy('key', $sorting);
        });
        
        $parameters = $parameters->paginate(15)->withQueryString();

        return view('admin.product-parameter-set.parameter.index', [
            'productParameterSet' => $productParameterSet,
            'parameters' => $parameters,
            'hasParameters' => $productParameterSet->parameters()->exists(),
            'hasFilter' => $hasFilter,
            'productParameterSetDetailUrl' => $productParameterSetDetailUrl,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $productParameterSetId
     * @return \Illuminate\Http\Response
     */
    public function create($productParameterSetId)
    {
        $productParameterSet = ProductParameterSet::findOrFail($productParameterSetId);
        $productParameterSetDetailUrl = route('admin.product-parameter-sets.show', [$productParameterSetId]);

        return view('admin.product-parameter-set.parameter.create', [
            'productParameterSet' => $productParameterSet,
            'productParameterSetDetailUrl' => $productParameterSetDetailUrl,
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

        return view('admin.product-parameter-set.parameter.show', [
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
        $parameter = $productParameterSet->parameters()
                        ->where('id', $id)->update($request->validated());
        
        $request->toast('success', __('Cập nhật thông số sản phẩm thành công!'));

        return response()->json([
            'product_parameter_set' => $productParameterSet,
            'parameter' => $productParameterSet->parameters()->where('id', $id)->first()
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
