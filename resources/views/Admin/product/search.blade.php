@extends('admin.layout.master')

@section('content')

<form class="col-9" type="get" action="{{url('/admin/search')}}">
    <div class="form-group">
        <input type="search" name="query" class="form-control" placeholder="Search Products...">
    </div>
    <button class="btn btn-primary">Search</button>
</form>

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

@endsection
