<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->where('status', 1)->get();
        return view('pages.products.index', compact('products'));
    }

    public function show($slug)
    {
        $products = Product::all()->where('status', 1);
        $product = Product::all()->where('slug', $slug)->first();
        return view('pages.products.show', compact('product', 'products'));
    }

    public function collections($slug)
    {
        $collection = Collection::all()->where('status', 1)->where('slug', $slug)->first();
        $collections = Collection::all()->where('status', 1);
        $productC = Product::where('collection_id', $collection->id)
            ->where('status', 1)
            ->get();
        return view('pages.collections.show', compact('collections', 'collection', 'productC'));
    }
}
