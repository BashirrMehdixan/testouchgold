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
                                    Wedding occasions
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->
    <section class="blog-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                @foreach($weddingOccasions as $wedding)
                    <div class="col-md-4">
                        <!-- blog post item start -->
                        <div class="blog-post-item mb-30">
                            <figure class="blog-thumb">
                                <a href="/wedding-occasions/{{$wedding->slug}}">
                                <img src="{{ asset('storage/'.$wedding->thumbnail) }}" alt="{{$wedding->name}}">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <h4 class="blog-title">
                                    <a href="/wedding-occasions/{{$wedding->slug}}">
                                        {{ $wedding->name }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <!-- blog post item end -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
