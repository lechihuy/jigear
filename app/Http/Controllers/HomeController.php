<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $topLevelCatalogs = Catalog::published()->whereNull('parent_id')->get();
        $latestProducts = Product::published()->latest()->take(3)->get();
        $randomTopLevelCatalogs = $topLevelCatalogs->random($topLevelCatalogs->count() < 3 ? $topLevelCatalogs->count() : 3)->all();
        
        return view('home', [
            'topLevelCatalogs' => $topLevelCatalogs,
            'latestProducts' => $latestProducts,
            'randomTopLevelCatalogs' => $randomTopLevelCatalogs,
        ]);
    }
}
