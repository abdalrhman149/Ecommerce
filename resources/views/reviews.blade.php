@extends('layouts.master')

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Add</span> Reviews</h3>
                    </div>
                </div>
            </div>

            <div class="contact-from-section mt-150 mb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mb-5 mb-lg-0">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="contact-form">
                                <form method="post" id="fruitkha-contact" action="/storereviews">
                                    @csrf
                                    <p>
                                        <input type="text" placeholder="Reviews" name="name" id="name"
                                            value="{{ old('name') }}" style="width:100%">
                                        <span class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </p>
                                    <p>
                                    <div>
                                        <input type="text" placeholder="Email" name="email" id="price"
                                            value="{{ old('email') }}" style="width:100%">
                                        <span class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <br>
                                    <div>
                                        <input type="text" placeholder="phone" name="phone" id="phone"
                                            value="{{ old('phone') }}" style="width:100%">
                                        <span class="text-danger">
                                            @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    </p>
                                    <div>
                                        <input type="text" placeholder="subject" name="subject" id="subject"
                                            value="{{ old('subject') }}" style="width:100%">
                                        <span class="text-danger">
                                            @error('subject')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <br>
                                    <p>
                                        <textarea name="message" id="message" cols="30" rows="10" placeholder="message" style="width:100%">{{ old('message') }}</textarea>
                                        <span class="text-danger">
                                            @error('message')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </p>

                                    <p>
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <!-- testimonail-section -->
    <div class="testimonail-section mt-80 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        @foreach ($reviews as $item)
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="assets/img/avaters/avatar2.png" alt="">
                                </div>
                                <div class="client-meta">
                                    <h3>{{ $item->name }} <span>{{ $item->subject }}</span></h3>
                                    <p class="testimonial-body">
                                        {{ $item->message }}
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="single-testimonial-slider"><br>
                            <p>the End of reviews</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
