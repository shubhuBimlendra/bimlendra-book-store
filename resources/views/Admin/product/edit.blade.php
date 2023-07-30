@extends('admin.layout.master')

@section('content')

<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="">
<a class="btn btn-success" href="{{ route('products.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Product Name:</strong>
<input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Product Name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>



<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Product Slug:</strong>
<input type="text" name="slug" value="{{$product->slug}}" class="form-control" placeholder="Product Slug">
@error('slug')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Short Description:</strong>
<textarea name="short_description" class="form-control" placeholder="Short Description">{{$product->short_description}}</textarea>
@error('short_description')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Description:</strong>
<textarea name="description" class="form-control" placeholder="Description">{{$product->description}}</textarea>
@error('description')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Regular Price:</strong>
<input type="text" name="regular_price" value="{{$product->regular_price}}" class="form-control" placeholder="Regular Price">
@error('regular_price')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Sale Price:</strong>
<input type="text" name="sale_price" value="{{$product->sale_price}}" class="form-control" placeholder="Sale Price">
@error('sale_price')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>SKU:</strong>
<input type="text" name="SKU" value="{{$product->SKU}}" class="form-control" placeholder="SKU">
@error('SKU')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Stock Status :</strong>
<select class="form-control input-md" name="stock_status" value="{{$product->stock_status}}">
    <option value="instock">InStock</option>
    <option value="outofstock">Out of Stock</option>
</select>
@error('stock_status')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Featured :</strong>
<select class="form-control input-md" name="featured" value="{{$product->featured}}">
    <option value="0">No</option>
    <option value="1">Yes</option>
</select>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Quantity:</strong>
<input type="text" name="quantity" value="{{$product->quantity}}" class="form-control" placeholder="Quantity">
@error('quantity')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Product Image:</strong>
<input type="file" class="input-file" name="image"/>
@error('image')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Select Category:</strong>
<select class="form-control input-md" name="category_id" value="{{$product->category_id}}" wire:change="changeSubcategory">
    <option value="">None</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
</select>
@error('category_id')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Select Subcategory:</strong>
<select class="form-control input-md" name="scategory_id" value="{{$product->scategory_id}}" wire:model="scategory_id">
    <option value="0">None</option>
        @foreach($scategories as $scategory)
            <option value="{{$scategory->id}}">{{$scategory->name}}</option>
        @endforeach
</select>
@error('scategory_id')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>

@endsection
