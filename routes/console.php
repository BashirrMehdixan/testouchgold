<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
//use Spatie\Sitemap\Sitemap;
//use Spatie\Sitemap\Tags\Url;
//use App\Models\Product;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

//Artisan::command('generate:sitemap', function () {
//    $sitemap = Sitemap::create();
//
//    $products = Product::all();
//    foreach ($products as $product) {
//        $sitemap->add(Url::create("/products/{$product->slug}")
//            ->setLastModificationDate($product->updated_at)
//            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
//            ->setPriority(0.8));
//    }
//
//    $collections = \App\Models\Collection::all();
//    foreach ($collections as $collection) {
//        $sitemap->add(Url::create("/collections/{$collection->slug}")
//            ->setLastModificationDate($collection->updated_at)
//            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
//            ->setPriority(0.8));
//    }
//    $collections = \App\Models\Collection::all();
//    foreach ($collections as $collection) {
//        $sitemap->add(Url::create("/collections/{$collection->slug}")
//            ->setLastModificationDate($collection->updated_at)
//            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
//            ->setPriority(0.8));
//    }
//
//    $sitemap->writeToFile(public_path('sitemap.xml'));
//})->describe('Generate the sitemap');
