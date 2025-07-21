@extends('layouts.master')


@section('content')
    <div class="cotainer mt-5 mp-5" style="text-align: center">



        <form action="/storeProductImage" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="row mt-5 mp5"></div>
            <input type="hidden" name="product_id" id="product_id"
                                             value="{{ $productid }}" style="width:100%">
            <div class=" col-8">
                <input type="file"class="form-control"  name="photo" id="photo">

            </div>
            <div class="col-4">
                <input type="submit"class="w-100" value="Submit" >

            </div>
            <span class="text-danger">
                @error('photo')
                    {{ $message }}
                @enderror
            </span>

        </form>
    </div>
    <div class="row mt-5 mp-5 ">
        @foreach ($productImages as $item)
            <div class="colum">
                <img class="m-2" src="{{ asset($item->imagepath) }}" width="200"height="200" alt="">
                <a href="/removeproductphoto/{{ $item->id }}" class="btn btn-danger"><i class="fas fa-trash"></i>
                    Delete</a>
            </div>
        @endforeach
    </div>
    </div>
@endsection
