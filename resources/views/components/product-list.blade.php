@props(['product', 'link'])
<!-- product list item end -->
<div class="product-list-item">
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
    <div class="product-content-list">
        <h5 class="product-name">
            <a href="{{ $link }}">
                {{ $product->name }}
            </a>
        </h5>
        <div class="price-box">
            <span class="price-regular">
                ${{ $product->price }}
            </span>
        </div>
        {!! $product->description !!}
    </div>
</div>
<!-- product list item end -->
