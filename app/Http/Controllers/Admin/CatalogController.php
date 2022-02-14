<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCatalogRequest;
use App\Http\Requests\Admin\UpdateCatalogRequest;

class CatalogController extends Controller
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
    public function index()
    {
        return view('admin.catalog.index', [
            'catalogs' => Catalog::latest()->paginate(5)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.create', [
            'catalogs' => Catalog::all()->map(fn($catalog) => [
                'label' => $catalog->title,
                'value' => $catalog->id
            ])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCatalogRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCatalogRequest $request)
    {
        $catalog = Catalog::create($request->validated());

        $request->toast('success', __('Tạo danh mục thành công!'));

        return response()->json(['catalog' => $catalog]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalog = Catalog::findOrFail($id);

        return view('admin.catalog.show', ['catalog' => $catalog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalog = Catalog::findOrFail($id);

        return view('admin.catalog.edit', [
            'catalog' => $catalog,
            'catalogs' => Catalog::all()->map(fn($catalog) => [
                'label' => $catalog->title,
                'value' => $catalog->id
            ])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatalogRequest $request, $id)
    {
        $catalog = Catalog::findOrFail($id);
        $catalog->update($request->validated());

        return response()->json(['catalog' => $catalog]);
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
