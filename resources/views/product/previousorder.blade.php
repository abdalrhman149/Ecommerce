@extends('layouts.master')


@section('content')
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            @foreach ($orders as $item)

                                <div class="card single-accordion">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Order Number {{ $item->id }}
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="billing-address-form">
                                                @csrf
                                                <form >
                                                    <p><input  disabled value="{{ $item->name }}" type="text"id="name"
                                                            name="name" required placeholder="Name">
                                                    </p>
                                                    <p><input disabled value="{{ $item->email }}"type="email"
                                                            id="email"name="email" required placeholder="Email"></p>
                                                    <p><input disabled value="{{ $item->address }}"type="text" id="address"
                                                            name="address" required placeholder="Address"></p>
                                                    <p><input disabled value="{{ $item->phone }}"type="tel" id="phone"
                                                            name="phone" required placeholder="Phone"></p>
                                                    <p>
                                                        <textarea disabled name="note" id="note" cols="30" rows="10" placeholder="Say Something">{{ $item->note }}</textarea>
                                                    </p>
                                                      <p><input disabled value="Time of order: {{ $item->created_at }}"type="text"
                                                             ></p>
                                                </form>
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-12">
                                                        <div class="cart-table-wrap">
                                                            <table class="cart-table">
                                                                <thead class="cart-table-head">
                                                                    <tr class="table-head-row">
                                                                        <th class="product-image">Product Image</th>
                                                                        <th class="product-name">Name</th>
                                                                        <th class="product-price">Price</th>
                                                                        <th class="product-quantity">Quantity</th>
                                                                        <th class="product-total">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $grandTotal = 0;
                                                                        $hasItems = false;
                                                                    @endphp

                                                                    @foreach ($item->orderdetails ?? [] as $details)
                                                                        @if ($details->product)
                                                                            @php
                                                                                $itemTotal =
                                                                                    $details->product->price *
                                                                                    $details->quantity;
                                                                                $grandTotal += $itemTotal;
                                                                                $hasItems = true;
                                                                            @endphp
                                                                            <tr class="table-body-row">
                                                                                <td class="product-image">
                                                                                    <img src="{{ asset($details->product->imagepath ?? 'images/default-product.jpg') }}"
                                                                                        alt="{{ $details->product->name ?? 'Product image' }}"
                                                                                        style="max-width: 100px; height: auto; object-fit: cover;">
                                                                                </td>
                                                                                <td class="product-name">
                                                                                    <a
                                                                                        href="/single-product/{{ $details->product->id ?? '#' }}">
                                                                                        {{ $details->product->name ?? 'Product Not Available' }}
                                                                                    </a>
                                                                                </td>
                                                                                <td class="product-price">
                                                                                    ${{ number_format($details->product->price ?? 0, 2) }}
                                                                                </td>
                                                                                <td class="product-quantity">
                                                                                    {{ $details->quantity }}
                                                                                </td>
                                                                                <td class="product-total">
                                                                                    ${{ number_format($itemTotal, 2) }}
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach

                                                                    @if (!$hasItems)
                                                                        <tr>
                                                                            <td colspan="5" class="text-center py-4">Your
                                                                                cart is empty</td>
                                                                        </tr>
                                                                    @endif
                                                                </tbody>
                                                                @if ($hasItems)
                                                                    <tfoot>
                                                                        <tr class="grand-total-row">
                                                                            <td colspan="4" class="text-right">
                                                                                {{-- <strong>Grand Total:</strong></td>
                                                                            <td>${{ number_format($grandTotal, 2) }}</td> --}}
                                                                        </tr>
                                                                    </tfoot>
                                                                @endif
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
                            @endforeach





                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="order-details-wrap">

                        <a onclick="event.preventDefault();document.getElementById('store-order').submit();"
                            class="boxed-btn">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
