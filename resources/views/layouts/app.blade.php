<!DOCTYPE html>
<html lang="{{session('locale')}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Testouch Gold | @yield('title', __('main.home')) </title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <link rel="icon" type="image/x-icon" size="32x32" href="{{ asset("assets/logo.png")}}">
    <meta name="keywords" content="gold, gold jewelery, gold bars, gold coins, rings, earrings"/>
    <meta name="description"
          content="At Testouch Gold, we specialize in offering an exquisite collection of high-quality diamonds, fine jewelry, gold bars, gold coins, and other precious metal items. With a passion for luxury and craftsmanship, we aim to provide our customers with timeless pieces that embody elegance and sophistication. Whether you are seeking a unique piece of jewelry for a special occasion or looking to invest in gold bars and coins, we are committed to delivering exceptional value and authenticity"/>
    <meta name="author" content="Testouch Gold"/>
    <meta property="og:title" content="Testouch Gold"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:image" content="{{asset('storage/'.$about->logo)}}"/>
    <meta property="og:site_name" content="{{ $about->title }}"/>
    <meta name="twitter:title" content="{{ $about->title }}"/>
    <meta name="twitter:description"
          content="At Testouch Gold, we specialize in offering an exquisite collection of high-quality diamonds, fine jewelry, gold bars, gold coins, and other precious metal items. With a passion for luxury and craftsmanship, we aim to provide our customers with timeless pieces that embody elegance and sophistication. Whether you are seeking a unique piece of jewelry for a special occasion or looking to invest in gold bars and coins, we are committed to delivering exceptional value and authenticity"/>
    <meta name="twitter:image" content="{{asset('storage/' . $about->logo)}}"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:image:alt" content="{{ $about->title}}"/>
    <link rel="shortcut icon" type="image/x-icon" size="48x48" href="{{ asset("assets/logo.png")}}">
    <link rel="shortcut icon" type="image/x-icon" size="16x16" href="{{ asset("assets/logo.png")}}">
    <link rel="stylesheet" href='{{asset("assets/css/vendor/bootstrap.min.css")}}'>
    <link rel="stylesheet" href='{{asset("assets/css/vendor/pe-icon-7-stroke.css")}}'/>
    <link rel="stylesheet" href='{{asset("assets/css/vendor/font-awesome.min.css")}}'/>
    <link rel="stylesheet" href='{{asset("assets/css/plugins/slick.min.css")}}'/>
    <link rel="stylesheet" href='{{asset("assets/css/plugins/animate.css")}}'/>
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jqueryui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>
<header class="header-area header-wide">
    <!-- header top start -->
    <div class="header-top bg-gray">
        <div class="container">
            <div class="row align-items-center">
                <div class="d-none d-lg-block col-lg-6">
                    <ul class="nav align-items-center gap-3">
                        @if(isset($contact))
                            <li class="current-wrap">
                                {{$contact->address}}
                            </li>
                            <li class="current-wrap">
                                <a href="tel:{{$contact->phone_number}}" class="text-dark">
                                    {{$contact->phone_number}}
                                </a>
                            </li>
                            <li class="current-wrap">
                                <a href="mailto:" class="text-dark">
                                    {{$contact->email}}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="header-top-settings">
                        <ul class="nav align-items-center justify-content-end">
                            <li class="language">
                                <span class="text-capitalize">{{session('locale')}}</span>
                                <i class="fa fa-angle-down @if($languages->count() <= 1) d-none @endif"></i>
                                <ul class="dropdown-list @if($languages->count() <= 1) d-none @endif">
                                    @foreach($languages as $lang)
                                        <li>
                                            <a
                                                href="@if($lang->slug == "en") / @else /{{$lang->slug}} @endif"
                                                class="@if(session('locale') == $lang->slug) d-none @endif"
                                            >
                                                {{$lang->name}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header top end -->

    <!-- main header start -->
    <div class="main-header d-none d-lg-block">
        <!-- header middle area start -->
        <div class="header-main-area sticky">
            <div class="container">
                <div class="row align-items-center position-relative">
                    <!-- start logo area -->
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="{{route('index')}}">
                                @if(isset($about))
                                    <img src="{{asset('storage/'.$about->logo)}}" alt="{{$about->title}}" title="{{$about->title}}">
                                @endif
                            </a>
                        </div>
                    </div>
                    <!-- start logo area -->

                    <!-- main menu area start -->
                    <div class="col-lg-10 position-static">
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        <li>
                                            <a href="{{route('index')}}">
                                                {{__('main.home')}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('about')}}">
                                                {{__('main.about')}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('products.index')}}">
                                                {{__('main.gold_jewelry')}}
                                                <i class="fa fa-angle-down {{$collections->count() < 0 ? 'd-none' : ""}}"></i>
                                            </a>
                                            @if($collections->count() > 0)
                                                <ul class="dropdown">
                                                    @foreach($collections as $collection)
                                                        <li>
                                                            <a href="{{ route('collections.show', ['slug' => $collection->slug]) }}">
                                                                {{$collection->name}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                        <li>
                                            <a href="{{route('gold.index')}}">
                                                {{__('main.menu_goldbar')}}
                                                <i class="fa fa-angle-down @if($goldBars->count() == 0) d-none @endif"></i>
                                            </a>
                                            @if($goldBars->count() > 0)
                                                <ul class="dropdown">
                                                    @foreach($goldBars as $goldBar)
                                                        <li>
                                                            <a href="{{route('gold.items', ['slug' => $goldBar->slug])}}">
                                                                {{$goldBar->name}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                        <li>
                                            <a href="{{route('wedding-occasions.index')}}">
                                                {{__('main.wedding_occasions')}}
                                                <i class="fa fa-angle-down @if($weddings->count() == 0) d-none @endif"></i>
                                            </a>
                                            @if($weddings->count() > 0)
                                                <ul class="dropdown">
                                                    @foreach($weddings as $wedding)
                                                        <li>
                                                            <a href="{{route('wedding-occasions.items', ['slug' => $wedding->slug])}}">
                                                                {{$wedding->name}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                        <li>
                                            <a href="{{route('gift.index')}}">
                                                {{__('main.gift_cards')}}
                                                <i class="fa fa-angle-down @if($giftCards->count() == 0) d-none @endif"></i>
                                            </a>
                                            <ul class="dropdown @if($giftCards->count() == 0) d-none @endif">
                                                @if($giftCards->count() > 0)
                                                    @foreach($giftCards as $card)
                                                        <li>
                                                            <a href="{{route('gift.index')}}/{{$card->slug}}">
                                                                {{$card->name}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{route('contact.index')}}">
                                                {{__('main.contact')}}
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                    <!-- main menu area end -->

                </div>
            </div>
        </div>
        <!-- header middle area end -->
    </div>
    <!-- main header start -->

    <!-- mobile header start -->
    <div class="mobile-header d-lg-none d-md-block sticky">
        <!--mobile header top start -->
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="mobile-main-header">
                        @if(isset($about))
                            <div class="mobile-logo">
                                <a href="{{route('index')}}">
                                    <img src="{{asset('storage/'.$about->logo)}}" alt="">
                                </a>
                            </div>
                        @endif
                        <div class="mobile-menu-toggler">
                            <button class="mobile-menu-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile header top start -->
    </div>
    <!-- mobile header end -->

    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="pe-7s-close"></i>
            </div>

            <div class="off-canvas-inner">
                <!-- mobile menu start -->
                <div class="mobile-navigation">
                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children">
                                <a href="{{route('index')}}">
                                    {{__('main.home')}}
                                </a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{route('about')}}">
                                    {{__('main.about')}}
                                </a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{route('products.index')}}">
                                    {{__('main.gold_jewelry')}}
                                </a>
                                @if($collections->count() > 0)
                                    <ul class="dropdown">
                                        @foreach($collections as $collection)
                                            <li>
                                                <a href="{{route('collections.show', ["slug" => $collection->slug])}}">
                                                    {{$collection->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            <li class="menu-item-has-children ">
                                <a href="{{route('gold.index')}}">
                                    {{__('main.menu_goldbar')}}
                                </a>
                                @if($goldBars->count() > 0)
                                    <ul class="dropdown">
                                        @foreach($goldBars as $gold)
                                            <li>
                                                <a href="{{route('gold.items', ["slug" => $gold->slug])}}">
                                                    {{$gold->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            <li class="menu-item-has-children ">
                                <a href="{{route('wedding-occasions.index')}}">
                                    {{__('main.wedding_occasions')}}
                                </a>
                                @if($weddings->count() > 0)
                                    <ul class="dropdown">
                                        @foreach($weddings as $wedding)
                                            <li>
                                                <a href="{{route('wedding-occasions.items', ["slug" => $wedding->slug])}}">
                                                    {{$wedding->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            <li class="menu-item-has-children ">
                                <a href="{{route('gift.index')}}">
                                    {{__('main.gift_cards')}}
                                </a>
                                @if($giftCards->count() > 0)
                                    <ul class="dropdown">
                                        @foreach($giftCards as $gift)
                                            <li>
                                                <a href="{{route('gift.show', ["slug" => $gift->slug])}}">
                                                    {{$gift->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            <li>
                                <a href="{{route('contact.index')}}">
                                    {{__('main.contact')}}
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->
    <!-- offcanvas mobile menu end -->
</header>
<main>
    @yield('content')
</main>


<!-- footer area start -->
<footer class="footer-widget-area">
    <div class="footer-top section-padding pb-3">
        <div class="container">
            <div class="row align-items-center justify-between">
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <div class="widget-title">
                            @if(isset($about))
                                <div class="widget-logo">
                                    <a href="{{route('index')}}">
                                        <img src="{{asset('storage/'.$about->logo)}}" alt="{{$about->title}}">
                                    </a>
                                </div>
                        </div>
                        <div class="widget-body">
                            <p>
                                {!! $about->content !!}
                            </p>
                        </div>
                        @endif
                    </div>

                </div>
                @if(isset($contact))
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="widget-item">
                            <h6 class="widget-title">
                                {{__('main.contact_us')}}
                            </h6>
                            <div class="widget-body">
                                <address class="contact-block">
                                    <ul>
                                        <li>
                                            <i class="pe-7s-home"></i>
                                            {{$contact->address}}
                                        </li>
                                        <li>
                                            <i class="pe-7s-mail"></i>
                                            <a href="mailto:{{$contact->email}}">
                                                {{$contact->email}}
                                            </a>
                                        </li>
                                        <li>
                                            <i class="pe-7s-call"></i>
                                            <a href="tel:{{$contact->phone_number}}">
                                                {{$contact->phone_number}}
                                            </a>
                                        </li>
                                    </ul>
                                </address>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="widget-item">
                        <h6 class="widget-title">
                            {{__('main.information')}}
                        </h6>
                        <div class="widget-body">
                            <ul class="info-list">
                                <li>
                                    <a href="{{route('about')}}">
                                        {{__('main.about_us')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('products.index')}}">
                                        {{__('main.menu_goldbar')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('wedding-occasions.index')}}">
                                        {{__('main.wedding_occasions')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('contact.index')}}">
                                        {{__('main.contact_us')}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                @if(isset($contact))
                    @if($contact->instagram != null && $contact->facebook != null && $contact->twitter != null && $contact->youtube != null)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="widget-item">
                                <h6 class="widget-title">
                                    {{ __('main.follow_us') }}
                                </h6>
                                <div class="widget-body social-link">
                                    <a href="{{$contact->facebook}}" class="@if($contact->facebook == null) d-none @endif">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="{{$contact->twitter}}" class="@if($contact->twitter == null) d-none @endif">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="{{$contact->instagram}}" class="@if($contact->instagram == null) d-none @endif">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                    <a href="{{$contact->youtube}}" class="@if($contact->youtube == null) d-none @endif">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

</footer>
<!-- footer area end -->


<script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/slick.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/countdown.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/nice-select.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/jqueryui.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/image-zoom.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/imagesloaded.pkgd.min.js')}}"></script>

{{--<script src="{{asset('assets/js/plugins/ajaxchimp.js')}}"></script>--}}

{{--<script src="{{asset('assets/js/plugins/ajax-mail.js')}}"></script>--}}

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>

<script src="{{asset('assets/js/plugins/google-map.js')}}"></script>

<script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
