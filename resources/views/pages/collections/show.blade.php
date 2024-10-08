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
                                    <a href="{{route('index')}}"><i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
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
                            <h5 class="sidebar-title">categories</h5>
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
                                            <!-- <div class="product-amount">-->
                                            <!-- <p>Showing 1–16 of 21 results</p>-->
                                            <!-- </div>-->
                                        </div>
                                    </div>
                                    {{--                                <div class="col-lg-5 col-md-6 order-1 order-md-2">--}}
                                    {{--                                    <div class="top-bar-right">--}}
                                    {{--                                        <form method="GET" action="">--}}
                                    {{--                                            <div class="product-short">--}}
                                    {{--                                                <p>Sort By : </p>--}}
                                    {{--                                                <select class="nice-select" name="sortby" onchange="this.form.submit()">--}}
                                    {{--                                                    <option value="relevance" {% if sortOrder==--}}
                                    {{--                                                    'relevance' %}selected{% endif %}>Relevance</option>--}}
                                    {{--                                                    <option value="name_asc" {% if sortOrder==--}}
                                    {{--                                                    'name_asc' %}selected{% endif %}>Name (A - Z)</option>--}}
                                    {{--                                                    <option value="name_desc" {% if sortOrder==--}}
                                    {{--                                                    'name_desc' %}selected{% endif %}>Name (Z - A)</option>--}}
                                    {{--                                                    <option value="price_asc" {% if sortOrder==--}}
                                    {{--                                                    'price_asc' %}selected{% endif %}>Price (Low > High)</option>--}}
                                    {{--                                                    <option value="price_desc" {% if sortOrder==--}}
                                    {{--                                                    'price_desc' %}selected{% endif %}>Price (High > Low)</option>--}}
                                    {{--                                                </select>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </form>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-30">
                                @foreach($productC as $product)
                                    <!-- product single item start -->
                                    <div class="col-md-4 col-sm-6">
                                        <x-product-component :link="route('index')" :product="$product"/>
                                        <x-product-list :link="route('index')" :product="$product"/>
                                    </div>
                                    <!-- product single item start -->
                                @endforeach
                            </div>
                            <!-- product item list wrapper end -->

                            <!-- start pagination area -->
                            <!-- <div class="paginatoin-area text-center">-->
                            <!--  <ul class="pagination-box">-->
                            <!--  <li><a class="previous" href="#"><i class="pe-7s-angle-left"></i></a></li>-->
                            <!--  <li class="active"><a href="#">1</a></li>-->
                            <!--  <li><a href="#">2</a></li>-->
                            <!--  <li><a href="#">3</a></li>-->
                            <!--  <li><a class="next" href="#"><i class="pe-7s-angle-right"></i></a></li>-->
                            <!--  </ul>-->
                            <!--  </div>-->
                            <!-- end pagination area -->
                        </div>
                    @else
                        <div class="section-title text-center">
                            <h2 class="title">There's no products in this collection</h2>
                        </div>
                    @endif
                </div>
                <!-- shop main wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->
@endsection
