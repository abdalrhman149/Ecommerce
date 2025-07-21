@extends('layouts.master')

@section('content')



@if (auth()->check())
     <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Add</span> Product</h3>
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
                                <form method="post" enctype="multipart/form-data" id="fruitkha-contact"
                                    action="/storeproduct">
                                    @csrf
                                    <p>
                                        <input type="text" placeholder="Name" name="name" id="name"
                                            value="{{ old('name') }}" style="width:100%">
                                        <span class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </p>
                                    <p style="display: flex; gap: 20px;">
                                    <div>
                                        <input type="number" placeholder="Price" name="price" id="price"
                                            value="{{ old('price') }}" style="width:100%">
                                        <span class="text-danger">
                                            @error('price')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div>
                                        <input type="number" placeholder="Quantity" name="quantity" id="quantity"
                                            value="{{ old('quantity') }}" style="width:100%">
                                        <span class="text-danger">
                                            @error('quantity')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    </p>
                                    <p>
                                        <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"
                                            style="width:100%">{{ old('description') }}</textarea>
                                        <span class="text-danger">
                                            @error('description')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </p>
                                    <p>
                                        <select name="category_id" id="category_id" class="form-control">
                                            @foreach ($allcategories as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('category_id')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </p>
                                    <p>
                                        <input type="file" class="form-control" name="photo"id="photo">
                                        <span class="text-danger">
                                            @error('photo')
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

@else

<b>status:you are not Authonticate
</b>


@endif



@endsection
