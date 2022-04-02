<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $q = $request->query('q');
        $products = Product::published()->where('sku', 'like', "%$q%")
            ->orWhere('title', 'like', "%$q%")
            ->orWhereFullText('title', $q)
            ->orWhere('unit_price', 'like', "%$q%");

        $request->whenHas('latest', function($latest) use ($products) {
            $products->latest();
        });

        $request->whenHas('price', function($price) use ($products) {
            $products->orderBy('unit_price', $price);
        });

        $products = $products->paginate(15)->withQueryString();

        return view('search', [
            'products' => $products,
            'q' => $q,
        ]);
    }
}
