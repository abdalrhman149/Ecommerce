@extends('layouts.master')

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Category</span> Website</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 text-center mb-4">
                        <div class="single-product-item h-100">
                            <div class="product-image">
                                <a href="/single-product/{{ $item->id }}">
                                    <img src="{{ asset($item->imagepath) }}" alt="">
                                </a>
                            </div>

                            <h3>{{ session('locale') == 'en' ? $item->name : $item->nameAr }}</h3>
                            <p class="product-price"><span>{{ $item->quantity }}</span> {{ $item->price }}$</p>

                            @auth
                                @if(Auth::user()&&(Auth::user()->role == 'admin'||Auth::user()->role == 'salesman'))
                                    <div class="mt-3">
                                        <a href="/removeproducts/{{ $item->id }}" class="btn btn-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                        <a href="/editproducts/{{ $item->id }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </div>
                                @endif
                            @endauth

                            <a href="/addproducttocart/{{ $item->id }}" class="cart-btn mt-3 d-inline-block">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </div>
@endsection

<style>
    svg {
        height: 50px;
    }

    .single-product-item {
        margin-bottom: 30px;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .product-image img {
        width: 100%;
        height: auto;
        border-radius: 6px;
        object-fit: cover;
    }

    .cart-btn {
        padding: 10px 20px;
        background-color: #F28123;
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .cart-btn:hover {
        background-color: #d36f1c;
        color: #fff;
    }

    .pagination {
        margin: 50px 0 30px;
        padding: 0;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .pagination li {
        margin: 0 5px;
        list-style: none;
    }

    .pagination li a,
    .pagination li span {
        display: inline-block;
        padding: 8px 15px;
        background: #f5f5f5;
        color: #333;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid #ddd;
    }

    .pagination li.active span {
        background: #F28123;
        color: white;
        border-color: #F28123;
    }

    .pagination li a:hover {
        background: #F28123;
        color: white;
        border-color: #F28123;
    }

    @media (max-width: 768px) {
        .pagination li {
            margin: 5px;
        }
    }
</style>
