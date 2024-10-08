<?php

namespace App\Http\Controllers\GiftCardsController;

use App\Http\Controllers\Controller;
use App\Models\GiftCard;
use Illuminate\Http\Request;

class GiftCardsController extends Controller
{
    public function index()
    {
        return view('pages.giftcards.index');
    }

    public function show($slug)
    {
        $gift = GiftCard::all()->where('slug', $slug)->first();
        return view('pages.giftcards.show', compact('gift'));
    }
}
