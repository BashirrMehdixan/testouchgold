@extends('layouts.app')
@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('index')}}">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('products.index')}}">
                                        {{__('main.gold_jewelry')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('collections.show', ['slug' => $product->collection->slug])}}">
                                        {{$product->collection->name}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{$product->name}}
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    @foreach($product->image as $image)
                                        <div class="pro-large-img img-zoom">
                                            <img src="{{asset('storage/'.$image)}}" alt="{{$product->name}}"/>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    @foreach($product->image as $image)
                                        <div class="pro-nav-thumb">
                                            <img src="{{asset('storage/'.$image)}}" alt="{{$product->name}}"/>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <h3 class="product-name">{{ $product->name }}</h3>
                                    <div class="price-box">
                                    <span class="price-regular">
                                        AED {{ $product->price }}
                                    </span>
                                    </div>
                                    <p class="pro-desc">
                                        {!! $product->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">
                            {{__('main.related_products')}}
                        </h2>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                        @foreach($products as $product)
                            <x-product-component :link="route('products.show', ['slug' => $product->slug])" :product="$product"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related products area end -->
@endsection
