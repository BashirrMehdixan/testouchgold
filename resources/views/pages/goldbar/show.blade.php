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
                                    <a href="/">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('gold.index')}}">
                                        Gold Bars and Gold Coins
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $gold->name }}
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
                                    @if($gold->thumbnail)
                                        @foreach($gold->thumbnail as $image)
                                            <div class="pro-large-img img-zoom">
                                                <img src="{{asset('storage/'.$image)}}" alt="{{$gold->name}}"/>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    @if($gold->thumbnail)
                                        @foreach($gold->thumbnail as $image)
                                            <div class="pro-nav-thumb">
                                                <img src="{{asset('storage/'.$image)}}" alt="{{$gold->name}}"/>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <h3 class="product-name">{{ $gold->name }}</h3>
                                    <div class="price-box">
                                    <span class="price-regular text-uppercase fw-bold">
                                        Aed {{ $gold->price }}
                                    </span>
                                    </div>
                                    <p class="pro-desc">
                                        {!! $gold->description !!}
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
                        <h2 class="title">Related Products</h2>
                        <p class="sub-title">Add related products to weekly lineup</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                        @foreach($goldBarsProducts as $gold)
                            <x-product-component :link="route('gold.index')" :product="$gold"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related products area end -->
@endsection
