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
                                    <a href="{{  route('wedding-occasions.index') }}">
                                        {{__('main.weddingOccasion')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{  route('wedding-occasions.items', ['slug' => $weddingOccasion->wedding_occasion->slug]) }}">
                                        {{ $weddingOccasion->wedding_occasion->name }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $weddingOccasion->name }}
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
                                    @if($weddingOccasion->image)
                                        @foreach($weddingOccasion->image as $image)
                                            <div class="pro-large-img img-zoom">
                                                <img src="{{asset('storage/'.$image)}}" alt="{{$weddingOccasion->name}}"/>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    @if($weddingOccasion->image)
                                        @foreach($weddingOccasion->image as $image)
                                            <div class="pro-nav-thumb">
                                                <img src="{{asset('storage/'.$image)}}" alt="{{$weddingOccasion->name}}"/>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <h3 class="product-name">{{ $weddingOccasion->name }}</h3>
                                    <div class="price-box">
                                    <span class="price-regular text-uppercase fw-bold">
                                        AED {{ $weddingOccasion->price }}
                                    </span>
                                    </div>
                                    <p class="pro-desc">
                                        {!! $weddingOccasion->description !!}
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
                        @foreach($weddings as $wedding)
                            <x-product-component :link="route('wedding-occasions.index')" :product="$wedding"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related products area end -->
@endsection
