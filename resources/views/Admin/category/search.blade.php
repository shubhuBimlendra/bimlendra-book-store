@extends('admin.layout.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Categories</title>
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
<form type="get" action="{{url('/admin/categorysearch')}}">
    <div class="form-group">
        <input type="search" name="query" class="form-control" placeholder="Search Products...">
    </div>
    <button class="btn btn-primary">Search</button>
</form>
</div>
<table class="table table-bordered">
<tr>
<th>S.No</th>
<th>Category Name</th>
<th>Category Slug</th>
</tr>
@foreach ($categories as $category)
<tr>
<td>{{ $category->id }}</td>
<td>{{ $category->name }}</td>
<td>{{ $category->slug }}</td>
</tr>
@endforeach
</table>
</body>
</html>

@endsection
