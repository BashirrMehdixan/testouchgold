@extends('layouts.app')
@section('title')
    {{$gift->name}}
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
                                    <a href="{{route('index')}}">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('gift.index')}}">
                                        {{__('main.gift_cards')}}
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
                        <img src="{{ asset('storage/'.$gift->thumbnail) }}" alt="{{$gift->name}}">
                    </figure>
                    <div class="blog-content">
                        <h3 class="blog-title">
                            {{ $gift->name }}
                        </h3>
                        @if($gift->file)
                            @foreach($gift->file as $file)
                                <iframe src="{{asset('storage/'.$file)}}" class="file-iframe"></iframe>
                            @endforeach
                        @endif
                        <div class="entry-summary">
                            {!! $gift->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
