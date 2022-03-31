<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Image;
use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;

class ProductController extends Controller
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
        $hasFilter = $request->hasAny(['q', 'published', 'catalog_id', 'in_stock', 'per_page']);
        $hasSort = $request->hasAny(['sort-id', 'sort-title', 'sort-sku', 'sort-unit_price']);

        if (!$hasSort) {
            return redirect($request->fullUrlWithQuery(['sort-id' => 'desc']));
        }

        $products = Product::query();

        // Filter
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


        $request->whenHas('in_stock', function($isStock) use ($products) {
            if ((bool) $isStock) {
                $products->where('stock', '>', 0);
            } else {
                $products->where('stock', 0)->orWhereNull('stock');
            }
        });

        $request->whenHas('catalog_id', function($catalogId) use ($products) {
            $products->where('catalog_id', $catalogId);
        });

        // Sorting
        $request->whenHas('sort-id', function($sorting) use ($products) {
            $products->orderBy('id', $sorting);
        });

        $request->whenHas('sort-title', function($sorting) use ($products) {
            $products->orderBy('title', $sorting);
        });

        $request->whenHas('sort-sku', function($sorting) use ($products) {
            $products->orderBy('sku', $sorting);
        });

        $request->whenHas('sort-unit_price', function($sorting) use ($products) {
            $products->orderBy('unit_price', $sorting);
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

        return view('admin.product.detail', ['product' => $product]);
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
            ]),
            'brandOptions' => Brand::all()->mapWithKeys(fn($brand) => [
                $brand->name => $brand->id
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

        if ($request->slug != $product->slug->slug) {
            $product->slug->update([
                'slug' => Str::slug($request->slug ?? $product->title)
            ]);
        }

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

        $availablePreviews = collect($request->input('previews'))->map(fn($preview) => json_decode($preview, true));
        $uploadedPreviews = collect($request->file('previews'));
        $product->previews()->whereNotIn('id', $availablePreviews->pluck('id')->toArray())->delete();

        $uploadedPreviews->each(function($preview) use ($product) {
            $previewPath = $preview->store('previews');
            $product->images()->create([
                'path' => $previewPath,
                'type' => 'preview',
            ]);
        });

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

    public function statisticTotalProduct()
    {
        return response()->json([
            'counter' => Product::count(),
        ]);
    }

    public function statisticStatusProduct()
    {
        return response()->json([
            'labels' => [
                [
                    'name' => __('xuất bản'),
                    'class' => 'bg-green-100',
                    'counter' => Product::published()->count(),
                ],
                [
                    'name' => __('ẩn'),
                    'class' => 'bg-gray-100',
                    'counter' => Product::where('published', 0)->count(),
                ],
            ]
        ]);
    }

    public function statisticStockProduct()
    {
        return response()->json([
            'labels' => [
                [
                    'name' => __('còn hàng'),
                    'class' => 'bg-green-100',
                    'counter' => Product::inStock()->count(),
                ],
                [
                    'name' => __('gần hết hàng (< 10)'),
                    'class' => 'bg-yellow-100',
                    'counter' => Product::where('stock', '<', 10)->count(),
                ],
                [
                    'name' => __('hết hàng'),
                    'class' => 'bg-red-100',
                    'counter' => Product::where('stock', 0)->count(),
                ],
            ]
        ]);
    }
}
