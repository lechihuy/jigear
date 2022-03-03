<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 15);
        $hasFilter = $request->hasAny(['q', 'published', 'catalog_id', 'per_page']);

        $products = Product::latest();

        $request->whenHas('q', function ($q) use ($products) {
            $products->where(function($query) use ($q) {
                $query->where('title', 'like', "%$q%")->orWhereFullText('title', $q)
                    ->orWhere('sku', 'like', "%$q%")
                    ->orWhere('unit_price', 'like', "%$q%");
            });
        });

        $request->whenHas('published', function($published) use ($products) {
            $products->where('published', $published);
        });

        $request->whenHas('purchasable', function($purchasable) use ($products) {
            $products->where('purchasable', $purchasable);
        });

        $request->whenHas('catalog_id', function($catalogId) use ($products) {
            $products->where('catalog_id', $catalogId);
        });

        $products = $products->paginate($perPage)->withQueryString();

        return view('admin.product.index', [
            'products' => $products,
            'catalogOptions' => Catalog::all()->mapWithKeys(fn($catalog) => [$catalog->title => $catalog->id]),
            'hasProducts' => Product::exists(),
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
        return view('admin.product.create', [
            'catalogOptions' => Catalog::all()->mapWithKeys(fn($catalog) => [
                $catalog->title => $catalog->id
            ])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());

        $request->toast('success', __('Tạo sản phẩm thành công!'));

        return response()->json(['product' => $product]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.edit', [
            'product' => $product,
            'catalogOptions' => Catalog::all()->mapWithKeys(fn($catalog) => [
                $catalog->title => $catalog->id
            ])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->validated());

        if ($request->hasFile('thumbnail')) {
            if ($product->thumbnail) {
                $product->thumbnail->delete();
            }
            
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails');
            $product->images()->create([
                'path' => $thumbnailPath,
                'type' => 'thumbnail',
            ]);
        }

        $request->toast('success', __('Cập nhật sản phẩm thành công!'));

        return response()->json(['product' => $product]);
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
        $product = Product::findOrFail($id);
        $product->delete();

        $request->toast('success', __('Xóa sản phẩm thành công!'));

        return response()->noContent();
    }
}
