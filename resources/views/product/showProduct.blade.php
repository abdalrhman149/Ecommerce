@extends('layouts.master')

@section('content')
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    {{-- <div class="single-product-img">
                        <img src="{{ asset($product->imagepath) }}" alt="">
                    </div> --}}
                </div>
                <div class="col-md-3"> 
                    <div class="single-product-content">
                        <p>Category: {{ $product->Category->name }}</p>

                        <h3>Green apples have polyphenols</h3>

                        <p class="single-product-pricing">
                            <span>price</span>{{ $product->price }}
                        </p>

                        <p class="single-product-pricing">
                            <span>quantity :</span>{{ $product->quantity }}
                        </p>

                        <p class="single-pro duct-pricing">
                            {{ $product->description }}
                        </p>

                        <div class="single-product-form">
                            <a href="/addproducttocart/{{ $product->id }}" class="cart-btn">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </a>
                        </div>
                    </div>
                </div>
                <div class="testimonail-section mt-80 mb-150">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1 text-center">
                                <div class="testimonial-sliders">
                                    @foreach ($product->ProductPhoto as $item)
                                        <div class="single-testimonial-slider">
                                            <div >
                                                <img style="width: 100%; height: 500px;border-radius:20px  50px!important;border:block 5px; max-width: none !important;"
                                                    src="{{ asset($item->imagepath) }}" alt="">
                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
          <div class="section-title text-center">
                        <h3><span class="orange-text">Related</span> Products</h3>
                    </div>
    <div class="row">

         @foreach ($relatedProducts as $item)
                    <div class="col-lg-4 col-md-6 text-center mb-4">
                        <div class="single-product-item h-100">
                            <div class="product-image">
                                <a href="/single-product/{{ $item->id }}"><img src="{{ asset($item->imagepath) }}" alt=""></a>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p class="product-price"><span>{{ $item->quantity }}</span> {{ $item->price }}$ </p>
                            <div class="mt-auto">


                                <a href="/addproducttocart/{{ $item->id }}" class="cart-btn" >
                                    <i class="fas fa-shopping-cart"></i> Add to Cart</a>

                            </div>
                        </div>
                    </div>
                @endforeach
    </div>
    </div>
@endsection
