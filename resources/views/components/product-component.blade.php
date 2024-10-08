@props(['product', 'link'])
<!-- product grid start -->
<div class="product-item">
    <figure class="product-thumb">
        <a href="{{ $link.'/products/'.$product->slug }}">
            @if(count($product->image ?? []) > 1)
                <img class="pri-img" src="{{asset('storage/'.$product->image[0])}}" alt="{{$product->name}}">
                <img class="sec-img" src="{{asset('storage/'.$product->image[1])}}" alt="{{$product->name}}">
            @else
                <img class="pri-img" src="{{asset('storage/'.$product->thumbnail[0])}}" alt="{{$product->name}}">
                <img class="sec-img" src="{{asset('storage/'.$product->thumbnail[1])}}" alt="{{$product->name}}">
            @endif
        </a>
    </figure>
    <div class="product-caption text-center">
{{--         <div class="product-identity">--}}
        {{--            <p class="manufacturer-name">--}}
        {{--                 {{ $product->name.product_category }}--}}
        {{--            </p>--}}
        {{--         </div>--}}
        <h6 class="product-name">
            <a href="{{ $link.'/products/'.$product->slug }}">{{ $product->name }}</a>
        </h6>
        <div class="price-box">
            <span class="price-regular">
                AED {{ $product->price }}
            </span>
        </div>
    </div>
</div>
<!-- product grid end -->
