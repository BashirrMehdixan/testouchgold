<?php

use App\Models\Collection;
use App\Models\GiftCard;
use App\Models\GoldBar;
use App\Models\GoldBarsProducts;
use App\Models\WeddingOccasion;
use App\Models\WeddingProduct;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Product;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('generate:sitemap', function () {
    $sitemap = Sitemap::create();
    $sitemap->add(Url::create('/')
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
        ->setPriority(1.0));

    $sitemap->add(Url::create('/about')
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(0.8));

    $sitemap->add(Url::create('/contact')
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(0.8));

    $products = Product::where('status', 1)->get();
    foreach ($products as $product) {
        $sitemap->add(Url::create("/products/{$product->slug}")
            ->setLastModificationDate($product->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.8));
    }

    $collections = Collection::where('status', 1)->get();
    foreach ($collections as $collection) {
        $sitemap->add(Url::create("/collections/{$collection->slug}")
            ->setLastModificationDate($collection->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.8));
    }
    $goldCollections = GoldBar::where('status', 1)->get();
    foreach ($goldCollections as $gold) {
        $sitemap->add(Url::create("/goldbar-and-goldcoin/{$gold->slug}")
            ->setLastModificationDate($gold->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.8));
    }
    $golds = GoldBarsProducts::where('status', 1)->get();
    foreach ($golds as $gold) {
        $sitemap->add(Url::create("/goldbar-and-goldcoin/products/{$gold->slug}")
            ->setLastModificationDate($gold->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.8));
    }
    $weddingC = WeddingOccasion::where('status', 1)->get();
    foreach ($weddingC as $wedding) {
        $sitemap->add(Url::create("/wedding-occasions/{$wedding->slug}")
            ->setLastModificationDate($wedding->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.8));
    }
    $weddings = WeddingProduct::where('status', 1)->get();
    foreach ($weddings as $wedding) {
        $sitemap->add(Url::create("/wedding-occasions/products/{$wedding->slug}")
            ->setLastModificationDate($wedding->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.8));
    }
    $gifts = GiftCard::where('status', 1)->get();
    foreach ($gifts as $gift) {
        $sitemap->add(Url::create("/gift-cards/{$gift->slug}")
            ->setLastModificationDate($gift->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.8));
    }

    $sitemap->writeToFile(public_path('sitemap.xml'));
})->describe('Generate the sitemap');
