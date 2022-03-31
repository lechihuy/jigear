<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductParameterSet;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductParameterSetRequest;
use App\Http\Requests\Admin\UpdateProductParameterSetRequest;

class ProductParameterSetController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 15);
        $hasFilter = $request->hasAny(['q', 'per_page']);
        $hasSort = $request->hasAny(['sort-id', 'sort-key']);

        if (!$hasSort) {
            return redirect($request->fullUrlWithQuery(['sort-id' => 'desc']));
        }

        $productParameterSets = ProductParameterSet::query();

        // Filter
        $request->whenHas('q', function ($q) use ($productParameterSets) {
            $productParameterSets->where(function($query) use ($q) {
                $query->where('key', 'like', "%$q%")->orWhereFullText('key', $q);
            });
        });
        
        // Sorting
        $request->whenHas('sort-id', function($sorting) use ($productParameterSets) {
            $productParameterSets->orderBy('id', $sorting);
        });

        $request->whenHas('sort-key', function($sorting) use ($productParameterSets) {
            $productParameterSets->orderBy('key', $sorting);
        });

        $productParameterSets = $productParameterSets->paginate($perPage)->withQueryString();

        return view('admin.product-parameter-set.index', [
            'productParameterSets' => $productParameterSets,
            'hasProductParameterSets' => ProductParameterSet::exists(),
            'hasFilter' => $hasFilter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product-parameter-set.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductParameterSetRequest $request)
    {
        $productParameterSet = ProductParameterSet::create($request->validated());

        $request->toast('success', __('Tạo bộ thông số sản phẩm thành công!'));

        return response()->json(['product_parameter_set' => $productParameterSet]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productParameterSet = ProductParameterSet::findOrFail($id);
        $parameters = $productParameterSet->parameters()->paginate(15)->withQueryString();

        return view('admin.product-parameter-set.detail', [
            'productParameterSet' => $productParameterSet,
            'parameters' => $parameters,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productParameterSet = ProductParameterSet::findOrFail($id);

        return view('admin.product-parameter-set.edit', [
            'productParameterSet' => $productParameterSet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateProductParameterSetRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductParameterSetRequest $request, $id)
    {
        $productParameterSet = ProductParameterSet::findOrFail($id);
        $productParameterSet->update($request->validated());

        $request->toast('success', __('Cập nhật bộ thông số sản phẩm thành công!'));

        return response()->json(['product_parameter_set' => $productParameterSet]);
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
        $productParameterSet = ProductParameterSet::findOrFail($id);
        $productParameterSet->delete();

        $request->toast('success', __('Xóa bộ thông số sản phẩm thành công!'));

        return response()->noContent();
    }
}
