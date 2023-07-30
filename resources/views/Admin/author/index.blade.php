@extends('admin.layout.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Authors</title>
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
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{route('authors.create')}}"> Create Author</a>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th>
<th>Name</th>
<th>Nationality</th>
<th>Phone Number</th>
<th>D.O.B</th>
</tr>
@foreach ($authors as $author)
<tr>
<td>{{ $author->id }}</td>
<td>{{ $author->name }}</td>
<td>{{ $author->nationality }}</td>
<td>{{ $author->phone_number }}</td>
<td>{{ $author->date_of_birth }}</td>
<td>
<form action="{{ route('authors.destroy',$author->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('authors.edit',$author->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{{$authors->links()}}
</body>
</html>

@endsection
