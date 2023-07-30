@extends('admin.layout.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>P roducts</title>
<style>
        nav svg {
            height: 20px;
        }
        nav .hidden {
            display: block !important;
        }
        .sclist{
            list-style:none;
        }
        .sclist li{
            line-height: 33px;
            border-bottom: 1px solid #ccc;
        }
        .slink i{
            font-size:17px;
            margin-left: 13px;
        }
    </style>
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<form type="get" action="{{url('/admin/search')}}">
    <div class="form-group">
        <h4>Products</h4>
        <input type="search" name="query" class="form-control" placeholder="Search Products...">
    </div>
    <button class="btn btn-primary">Search</button>
</form>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{route('products.create')}}"> Create Product</a>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
    <th>Id</th>
    <th>Name</th>
    <th>Stock</th>
    <th>Price</th>
    <th>Sale Price</th>
    <th>Category</th>
    <th>Date</th>
    <th>Action</th>
</tr>
@foreach ($products as $product)
<tr>
<td>{{ $product->id }}</td>
<td>{{ $product->name }}</td>
<td>{{ $product->stock_status }}</td>
<td>{{ $product->regular_price }}</td>
<td>{{ $product->sale_price }}</td>
<td>{{$product->category_id}}</td>
<td>{{$product->created_at}}</td>
<td>
<form action="{{ route('products.destroy',$product->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{{$products->links()}}
</body>
</html>

@endsection
