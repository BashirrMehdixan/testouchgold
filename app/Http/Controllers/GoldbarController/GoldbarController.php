<?php

namespace App\Http\Controllers\GoldbarController;

use App\Http\Controllers\Controller;
use App\Models\GoldBar;
use App\Models\GoldBarsProducts;
use Illuminate\Http\Request;

class GoldbarController extends Controller
{
    public function index()
    {
        $goldBars = GoldBar::all()->where('status', 1);
        return view('pages.goldbar.index', compact('goldBars'));
    }

    public function items($slug)
    {
        $goldCollection = GoldBar::all()->where('status', 1)->where('slug', $slug)->first();
        $golds = GoldBarsProducts::all()->where('gold_bars_id', $goldCollection->id);
        return view('pages.goldbar.items', compact('golds', 'goldCollection'));
    }

    public function show(string $slug)
    {
        $goldBarsProducts = GoldBarsProducts::all()->where('status', 1);
        $gold = GoldBarsProducts::all()->where('slug', $slug)->first();
        return view('pages.goldbar.show', compact('gold', 'goldBarsProducts'));
    }

}
