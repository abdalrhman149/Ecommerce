@extends('layouts.master')

@section('content')
    <!-- Include jQuery and DataTables CSS/JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <div class="container mt-5 np-5">

          <a href="/addproduct" class="btn btn-warning">
    <i class="fas fa-plus"></i> Add Product
</a>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{session('locale')=='en'? $item->name:$item->nameEn }}</td>


                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            <img src="{{ asset($item->imagepath) }}" width="200"heigh="200" alt="">
                        </td>
                        <td>
                            <a href="/removeproducts/{{ $item->id }}" class="btn btn-danger"><i class="fas fa-trash"></i>
                                Delete</a>
                            <a href="/editproducts/{{ $item->id }}" class="btn btn-primary"><i class="fas fa-edit"></i>
                                Edit</a>
                                 <a href="/AddproductImage/{{ $item->id }}" class="btn btn-dark"><i class="fas fa-image"></i>
                                add product image</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            new DataTable('#myTable');
        });
    </script>
@endsection
