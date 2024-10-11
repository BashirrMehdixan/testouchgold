<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Collection;
use App\Models\Contact;
use App\Models\GiftCard;
use App\Models\GoldBar;
use App\Models\Language;
use App\Models\WeddingOccasion;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales([...Language::where('status', 1)->pluck('slug')]);
        });
        $languages = Language::orderBy('order')->where("status", 1)->get();
        $collections = Collection::where("status", 1)->get();
        $weddings = WeddingOccasion::where("status", 1)->get();
        $giftCards = GiftCard::where("status", 1)->get();
        $goldBars = GoldBar::where('status', 1)->get();
        $contacts = Contact::all();
        $about = About::first();
        view()->share('collections', $collections);
        view()->share('weddings', $weddings);
        view()->share('languages', $languages);
        view()->share('giftCards', $giftCards);
        view()->share('goldBars', $goldBars);
        view()->share('contacts', $contacts);
        view()->share('about', $about);
    }
}
