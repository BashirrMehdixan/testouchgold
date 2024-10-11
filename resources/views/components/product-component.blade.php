@props(['product', 'link'])
<!-- product grid start -->
<div class="product-item">
    <figure class="product-thumb">
        <a href="{{ $link }}">
            @if(count($product->image ?? []) > 1)
                <img class="pri-img" src="{{asset('storage/'.$product->image[0])}}" alt="{{$product->name}}">
                @if(isset($product->image[1]))
                    <img class="sec-img" src="{{asset('storage/'.$product->image[1])}}" alt="{{$product->name}}">
                @else
                    <img class="pri-img" src="{{asset('storage/'.$product->image[0])}}" alt="{{$product->name}}">
                @endif
            @else
                <img class="pri-img" src="{{asset('storage/'.$product->thumbnail[0])}}" alt="{{$product->name}}">
                @if(isset($product->thumbnail[1]))
                    <img class="sec-img" src="{{asset('storage/'.$product->thumbnail[1])}}" alt="{{$product->name}}">
                @else
                    <img class="pri-img" src="{{asset('storage/'.$product->thumbnail[0])}}" alt="{{$product->name}}">
                @endif
            @endif
        </a>
    </figure>
    <div class="product-caption text-center">
        <h6 class="product-name">
            <a href="{{ $link }}">{{ $product->name }}</a>
        </h6>
        <div class="price-box">
            <span class="price-regular">
                AED {{ $product->price }}
            </span>
        </div>
    </div>
</div>
<!-- product grid end -->
