@extends('layouts.app')
@section('title')
    {{__('main.about_us')}}
@endsection
@section('content')
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
                                    {{__('main.about')}}
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- about us area start -->
    <section class="about-us section-padding">
        <div class="container">
            <div class="row align-items-center">
                @foreach($abouts as $about)

                    <div class="col-lg-5">
                        <div class="about-thumb">
                            <img src="{{ asset('storage/'.$about->image) }}" alt="about thumb">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="about-content">
                            <h2 class="about-title">
                                {{__('main.about_us')}}
                            </h2>
                            <h5 class="about-sub-title">
                                {{ $about->title}}
                            </h5>
                            <p>
                                {!! $about->description !!}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- about us area end -->
@endsection
