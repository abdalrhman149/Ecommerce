@extends('layouts.master')


@section('content')
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Billing Address
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form" >
                                            <form action="/storeorder" method="POST"id="store-order"name="store-order">
                                                @csrf
                                                <p><input type="text"id="name" name="name" required placeholder="Name">
                                                </p>
                                                <p><input type="email" id="email"name="email" required
                                                        placeholder="Email"></p>
                                                <p><input type="text"id="address" name="address" required
                                                        placeholder="Address"></p>
                                                <p><input type="tel"id="phone" name="phone" required
                                                        placeholder="Phone"></p>
                                                <p>
                                                    <textarea name="note" id="note" cols="30" rows="10" placeholder="Say Something"></textarea>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Shipping Address
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shipping-address-form">
                                            <p>Your shipping address form is here.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Card Details

                                        </button>

                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="card-details">
                                            <div class="cart-section mt-150 mb-150">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-12">
                                                            <div class="cart-table-wrap">
                                                                <table class="cart-table">
                                                                    <thead class="cart-table-head">
                                                                        <tr class="table-head-row">
                                                                            <th class="product-remove"></th>
                                                                            <th class="product-image">Product Image</th>
                                                                            <th class="product-name">Name</th>
                                                                            <th class="product-price">Price</th>
                                                                            <th class="product-quantity">Quantity</th>
                                                                            <th class="product-total">Total</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @php $grandTotal = 0; @endphp
                                                                        @foreach ($cartproduct as $item)
                                                                            @php
                                                                                $itemTotal =
                                                                                    $item->product->price *
                                                                                    $item->quantity;
                                                                                $grandTotal += $itemTotal;
                                                                            @endphp
                                                                            <tr class="table-body-row">
                                                                                <td class="product-remove">
                                                                                    <a
                                                                                        href="/deletecartitem/{{ $item->id }}"><i
                                                                                            class="far fa-window-close"></i></a>
                                                                                </td>
                                                                                <td class="product-image">
                                                                                    <img src="{{ asset($item->product->imagepath) }}"
                                                                                        alt="{{ $item->product->name }}"
                                                                                        style="max-width: 100px;">
                                                                                </td>

                                                                                <td class="product-name"><a
                                                                                        href="/single-product/{{ $item->id }}">{{ $item->product->name }}
                                                                                    </a></td>
                                                                                <td class="product-price">
                                                                                    {{ $item->product->price }}</td>
                                                                                <td class="product-quantity">
                                                                                    {{ $item->quantity }}</td>
                                                                                <td class="product-total">
                                                                                    ${{ number_format($itemTotal, 2) }}</td>
                                                                            </tr>
                                                                        @endforeach


                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="total-section">
                                                                <table class="total-table">
                                                                    <thead class="total-table-head">
                                                                        <tr class="table-total-row">
                                                                            <th>Total</th>
                                                                            <th>Price</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>


                                                                        <tr class="total-data">
                                                                            <td><strong>Total: </strong></td>
                                                                            <td>${{ number_format($grandTotal, 2) }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="order-details-wrap">

                        <a
                        onclick="event.preventDefault();document.getElementById('store-order').submit();" class="boxed-btn">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
