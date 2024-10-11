@extends('layouts.app')
@section('title')
    {{__('main.contact_us')}}
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
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{__('main.contact_us')}}
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- google map start -->
    <div class="map-area section-padding">
        @foreach($contacts as $contact)
            @if($contact->map)
                <iframe src="{{ $contact->map}}" height="450" style="border:0;" allowfullscreen="true"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            @endif
        @endforeach
    </div>
    <!-- google map end -->

    <!-- contact area start -->
    <div class="contact-area section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-message">
                        <h4 class="contact-title">
                            {{__('main.contact_us')}}
                        </h4>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="contact-form" method="POST" action="{{route('contact.send')}}" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group mb-4">
                                        <input name="name" placeholder="{{__('main.full_name')}} *" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group mb-4">
                                        <input name="phone" placeholder="{{__('main.phone')}} *" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group mb-4">
                                        <input name="email" placeholder="{{__('main.email')}} *" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group mb-4">
                                        <input name="subject" placeholder="{{__('main.subject')}} *" type="text">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="contact2-textarea">
                                        <div class="form-group mb-4">
                                            <textarea placeholder="{{__('main.message')}} *" name="message"
                                                      class="form-control2"></textarea>
                                        </div>
                                    </div>
                                    <div class="contact-btn">
                                        <button class="btn btn-sqr" type="submit">
                                            {{__('main.send_message')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info">
                        <h4 class="contact-title">
                            {{__('main.our_address')}}
                        </h4>
                        {!! $about->content !!}
                        <ul class="mt-4">
                            @foreach($contacts as $contact)
                                <li>
                                    <i class="fa fa-fax"></i>
                                    {{__('main.address')}} : {{ $contact->address }}
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    {{ $contact->phone_number }}
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    {{__('main.email')}}: {{ $contact->email }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->
@endsection
