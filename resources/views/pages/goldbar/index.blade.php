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
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{__('main.menu_goldbar')}}
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->


    <section class="product-banner-statistics py-5">
        <div class="container">
            @if($goldBars->count() > 0)
                <div class="row pt-3">
                    @foreach($goldBars as $gold)
                        <div class="col-12 col-md-6 col-lg-4">
                            <figure class="banner-statistics">
                                <a href="{{route('gold.items', ['slug' => $gold->slug])}}">
                                    <img src="{{ asset('storage/'.$gold->thumbnail) }}" alt="{{ $gold->name }}">
                                </a>
                                <div class="banner-content banner-content_style2">
                                    <h5 class="banner-text3">
                                        <a href="{{route('gold.items', ['slug' => $gold->slug])}}">
                                            {{ $gold->name }}
                                        </a>
                                    </h5>
                                </div>
                            </figure>
                        </div>
                    @endforeach
                </div>
            @else
                <h4 class="fs-1 text-center">
                    {{__('main.no_products')}}
                </h4>
            @endif
        </div>
    </section>
@endsection
