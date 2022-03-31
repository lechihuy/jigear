<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBrandRequest;
use App\Http\Requests\Admin\UpdateBrandRequest;

class BrandController extends Controller
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
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 15);
        $hasFilter = $request->hasAny(['q', 'per_page']);
        $hasSort = $request->hasAny(['sort-id', 'sort-name']);

        if (!$hasSort) {
            return redirect($request->fullUrlWithQuery(['sort-id' => 'desc']));
        }

        $brands = Brand::query();

        // Filter
        $request->whenHas('q', function ($q) use ($brands) {
            $brands->where('name', 'like', "%$q%")->orWhereFullText('name', $q);
        });

        // Sorting
        $request->whenHas('sort-id', function($sorting) use ($brands) {
            $brands->orderBy('id', $sorting);
        });

        $request->whenHas('sort-name', function($sorting) use ($brands) {
            $brands->orderBy('name', $sorting);
        });

        $brands = $brands->paginate($perPage)->withQueryString();

        return view('admin.brand.index', [
            'brands' => $brands,
            'hasBrands' => Brand::exists(),
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
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = Brand::create($request->validated());

        $request->toast('success', __('Tạo thương hiệu thành công!'));

        return response()->json(['brand' => $brand]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);

        return view('admin.brand.detail', ['brand' => $brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('admin.brand.edit', [
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateBrandRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->update($request->validated());

        if ($request->hasFile('thumbnail')) {
            if ($brand->thumbnail) {
                $brand->thumbnail->delete();
            }
            
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails');
            $brand->images()->create([
                'path' => $thumbnailPath,
                'type' => 'thumbnail',
            ]);
        }

        $request->toast('success', __('Cập nhật thương hiệu thành công!'));

        return response()->json(['brand' => $brand]);
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
        $brand = Brand::findOrFail($id);
        $brand->delete();

        $request->toast('success', __('Xóa thương hiệu thành công!'));

        return response()->noContent();
    }
}
