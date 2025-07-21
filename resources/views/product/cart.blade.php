@extends('layouts.master')
@section('content')
    <!-- cart -->
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
                                        $itemTotal = $item->product->price * $item->quantity;
                                        $grandTotal += $itemTotal;
                                    @endphp
                                    <tr class="table-body-row">
                                        <td class="product-remove">
                                            <a href="/deletecartitem/{{ $item->id }}"><i
                                                    class="far fa-window-close"></i></a>
                                        </td>
                                        <td class="product-image">
                                            <img src="{{ asset($item->product->imagepath) }}"
                                                alt="{{ $item->product->name }}" style="max-width: 100px;">
                                        </td>

                                        <td class="product-name"><a
                                                href="/single-product/{{ $item->id }}">{{ $item->product->name }}
                                            </a></td>
                                        <td class="product-price">{{ $item->product->price }}</td>
                                        <td class="product-quantity">{{ $item->quantity }}</td>
                                        <td class="product-total">${{ number_format($itemTotal, 2) }}</td>
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
                        <div class="cart-buttons">

                            <a href="/Completeorder" class="boxed-btn black">Check Out</a>
                            <a href="/previousorder" class="boxed-btn black"> previous  order</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->
@endsection
