<?php

namespace App\Http\Controllers\WeddingOccasionController;

use App\Http\Controllers\Controller;
use App\Models\WeddingOccasion;
use App\Models\WeddingProduct;
use Illuminate\Http\Request;

class WeddingOccasionController extends Controller
{
    public function index()
    {
        $weddingOccasions = WeddingOccasion::all();
        return view('pages.wedding.index', compact('weddingOccasions'));
    }

    public function items($slug)
    {
        $wCollection = WeddingOccasion::all()->where('status', 1)->where('slug', $slug)->first();
        $weddingC = WeddingProduct::all()->where('wedding_occasion_id', $wCollection->id);
        return view('pages.wedding.items', compact('wCollection', 'weddingC'));
    }

    public function show($slug)
    {
//        $weddingCollection = WeddingProduct::all()->where('status', 1)->where('slug', $slug)->first();
        $weddings = WeddingProduct::all()->where('status', 1);
        $weddingOccasion = WeddingProduct::all()->where('slug', $slug)->first();
        return view('pages.wedding.show', compact('weddingOccasion','weddings'));
    }
}
