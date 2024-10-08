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
                                    <a href="/gift-cards">
                                        Gift cards
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $gift->name }}
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <div class="blog-main-wrapper section-padding">
        <div class="container">
            <div class="blog-item-wrapper">
                <!-- blog post item start -->
                <div class="blog-post-item blog-details-post">
                    <figure class="blog-thumb">
                        <img src="{{$gift->thumbnail}}" alt="{{$gift->name}}">
                    </figure>
                    <div class="blog-content">
                        <h3 class="blog-title">
                            {{ $gift->name }}
                        </h3>
                        <div class="entry-summary">
                            {!! $gift->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
