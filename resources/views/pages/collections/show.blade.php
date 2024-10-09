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
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{$collection->name}}
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
    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <!-- sidebar area start -->
                <div class="col-lg-2 order-2">
                    <aside class="sidebar-wrapper">
                        <!-- single sidebar start -->
                        <div class="sidebar-single">
                            <h5 class="sidebar-title">
                                {{__('main.categories')}}
                            </h5>
                            <div class="sidebar-body">
                                <ul class="shop-categories">
                                    @foreach($collections as $collection)
                                        <li>
                                            <a href="/collections/{{$collection->slug}}">
                                                {{ $collection->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- single sidebar end -->
                    </aside>
                </div>
                <!-- sidebar area end -->
                <!-- shop main wrapper start -->
                <div class="col-lg-10 order-1">
                    @if($productC->count() > 0)
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a class="active" href="#" data-target="grid-view" data-bs-toggle="tooltip"
                                                   title="Grid View">
                                                    <i class="fa fa-th"></i>
                                                </a>
                                                <a href="#" data-target="list-view" data-bs-toggle="tooltip" title="List View">
                                                    <i class="fa fa-list"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-30">
                                @foreach($productC as $product)
                                    <!-- product single item start -->
                                    <div class="col-md-4 col-sm-6">
                                        <x-product-component :link="route('products.show', ['slug' => $product->slug])"
                                                             :product="$product"/>
                                        <x-product-list :link="route('products.show', ['slug' => $product->slug])" :product="$product"/>
                                    </div>
                                    <!-- product single item start -->
                                @endforeach
                            </div>
                            <!-- product item list wrapper end -->
                        </div>
                    @else
                        <div class="section-title text-center">
                            <h2 class="title">
                                {{__('main.no_products')}}
                            </h2>
                        </div>
                    @endif
                </div>
                <!-- shop main wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->
@endsection
