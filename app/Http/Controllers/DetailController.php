<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slug;
use App\Models\Catalog;
use App\Models\Product;

class DetailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $slug)
    {
        $slug = Slug::where('slug', $slug)->firstOrFail();
        $sluggable = $slug->sluggable;

        if ($sluggable instanceof Product) {
            return view('product-detail', [
                'product' => $sluggable,
            ]);
        }

        if ($sluggable instanceof Catalog) {

            $products = $sluggable->allProducts();

            $request->whenHas('latest', function($latest) use ($products) {
                $products->latest();
            });

            $request->whenHas('price', function($price) use ($products) {
                $products->orderBy('unit_price', $price);
            });
            
            
            $products = $products->paginate(15)->withQueryString();

            return view('catalog-detail', [
                'catalog' => $sluggable,
                'products' => $products,
            ]);
        }
        
    }
}
