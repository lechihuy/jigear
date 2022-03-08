<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductParameterSet;
use App\Http\Controllers\Controller;

class ProductParameterSetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 15);
        $hasFilter = $request->hasAny(['q', 'key', 'per_page']);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
