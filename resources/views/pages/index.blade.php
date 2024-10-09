@extends('layouts.app')
@section('content')
    <!-- hero slider area start -->
    <section class="slider-area">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <!-- single slider item start -->
            @foreach($banners as $banner)
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="{{ asset('storage/'.$banner->image) }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="hero-slider-content slide-1">
                                        <h2 class="slide-title" style="color: {{$banner->title_color}}">{{ $banner->title }}
                                        </h2>
                                        <h4 class="slide-desc" style="color: {{ $banner->description_color}}">
                                            {!! $banner->description !!}
                                        </h4>
                                        <a href="/{{$banner->slug}}" class="btn btn-hero">
                                            {{__('main.read_more')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- single slider item end -->
        </div>
    </section>
    <!-- hero slider area end -->

    <!-- featured product area start -->
    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">
                            {{__('main.featured_products')}}
                        </h2>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if($products->count() > 0)
                        <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                            @foreach($products as $product)
                                <x-product-component :link="route('products.show', ['slug' => $product->slug])" :product="$product"/>
                            @endforeach
                        </div>
                    @else
                        <div class="py-2 fs-2 text-center">
                            {{__('main.no_products')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- featured product area end -->

    <!-- product banner statistics area start -->
    <section class="product-banner-statistics">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">
                            {{__('main.our_collections')}}
                        </h2>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if($collections->count() > 0)
                        <div class="product-banner-carousel slick-row-10">
                            @foreach($collections as $collection)
                                <!-- banner single slide start -->
                                <div class="banner-slide-item">
                                    <figure class="banner-statistics">
                                        <a href="{{route('collections.show', ['slug' => $collection->slug])}}">
                                            <img src="{{ asset('storage/'.$collection->thumbnail) }}" alt="{{ $collection->name }}">
                                        </a>
                                        <div class="banner-content banner-content_style2">
                                            <h5 class="banner-text3">
                                                <a href="{{route('collections.show', ['slug' => $collection->slug])}}">{{ $collection->name }}</a>
                                            </h5>
                                        </div>
                                    </figure>
                                </div>
                                <!-- banner single slide start -->
                            @endforeach
                        </div>
                    @else
                        <div class="py-3 fs-2 text-center">
                            {{__('main.no_products')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- product banner statistics area end -->

    <section class="product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">
                            {{__('main.our_products')}}
                        </h2>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-container">
                        <!-- product tab content start -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    @foreach($products as $product)
                                        <x-product-component :link="route('products.show', ['slug' => $product->slug])" :product="$product"/>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- product tab content end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product area end -->

    <!-- product banner statistics area start -->
    <section class="product-banner-statistics">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">
                            {{__('main.wedding_occasions')}}
                        </h2>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if($weddings->count() > 0)
                        <div class="product-banner-carousel slick-row-10">
                            @foreach($weddings as $wedding)
                                <!-- banner single slide start -->
                                <div class="banner-slide-item">
                                    <figure class="banner-statistics">
                                        <a href="{{route('collections.show', ['slug' => $collection->slug])}}">
                                            <img src="{{ asset('storage/'.$wedding->thumbnail) }}" alt="{{ $wedding->name }}">
                                        </a>
                                        <div class="banner-content banner-content_style2">
                                            <h5 class="banner-text3">
                                                <a href="{{route('collections.show', ['slug' => $collection->slug])}}">{{ $wedding->name }}</a>
                                            </h5>
                                        </div>
                                    </figure>
                                </div>
                                <!-- banner single slide start -->
                            @endforeach
                        </div>
                    @else
                        <div class="py-3 fs-2 text-center">
                            {{__('main.no_products')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- product banner statistics area end -->

    <!-- about us area start -->
    <section class="about-us section-padding section-padding">
        <div class="container">
            <div class="row align-items-center">
                @if($abouts->count() > 0)
                    @foreach($abouts as $about)
                        <div class="col-lg-5">
                            <div class="about-thumb">
                                <img src="{{asset('storage/'.$about->image)}}" class="about-thumb" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="about-content">
                                <h2 class="about-title">
                                    {{__('main.about_us')}}
                                </h2>
                                <h5 class="about-sub-title">
                                    {{ $about->title }}
                                </h5>
                                <p>
                                    {!! $about->description !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- about us area end -->
@endsection
