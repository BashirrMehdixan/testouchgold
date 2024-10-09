<?php

namespace App\Http\Controllers\HomeController;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Collection;
use App\Models\GoldBarsProducts;
use App\Models\Language;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->where('status', 1)->get();
        $banners = Banner::where('status', 1)->get();
        $goldProducts = GoldBarsProducts::inRandomOrder()->where('status', 1)->get();
        return view('pages.index', compact('products', 'banners', 'goldProducts'));
    }
}
