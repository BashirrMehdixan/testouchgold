@extends('layouts.app')
@section('title')
    {{$wCollection->name}}
@endsection
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
                                    <a href="{{ route('index') }}">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('wedding-occasions.index') }}">
                                        {{__('main.wedding_occasions')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $wCollection->name }}
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
                        @foreach($weddingC as $wedding)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <x-product-component
                                    :link="route('wedding-occasions.show', ['slug' => $wedding->slug])"
                                    :product="$wedding"/>
                                <x-product-list
                                    :link="route('wedding-occasions.show', ['slug' => $wedding->slug])"
                                    :product="$wedding"/>
                            </div>
                        @endforeach
                    </div>
                    <!-- product item list wrapper end -->
                </div>
                <!-- shop main wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->
@endsection
