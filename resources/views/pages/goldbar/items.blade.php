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
                                    <a href="{{route('gold.index')}}">
                                        {{__('main.menu_goldbar')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $goldCollection->name }}
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
                        @if($golds->count() > 0)
                            @foreach($golds as $gold)
                                <!-- product single item start -->
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <x-product-component :link="route('gold.show', ['slug' => $gold->slug])" :product="$gold"/>
                                    <x-product-list :link="route('gold.show', ['slug' => $gold->slug])" :product="$gold"/>
                                </div>
                                <!-- product single item start -->
                            @endforeach
                        @endif
                    </div>
                    <!-- product item list wrapper end -->
                </div>
                <!-- shop main wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->
@endsection
