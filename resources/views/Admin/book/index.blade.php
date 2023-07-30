@extends('admin.layout.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Books</title>
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
<a class="btn btn-success" href="{{route('books.create')}}"> Create Book</a>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>ID</th>
<th>Title</th>
<th>Description</th>
<th>Category ID</th>
<th>Author ID</th>
<th>Added By</th>
<th>Updated By</th>
<th>Price</th>
<th>Discount</th>
<th>Edition</th>
<th>Language</th>
<th>Publication Date</th>
<th>ISBN</th>
<th>Image</th>
</tr>
@foreach ($books as $book)
<tr>
<td>{{ $book->id }}</td>
<td>{{ $book->title }}</td>
<td>{{ $book->description }}</td>
<td>{{ $book->category->name }}</td>
<td>{{ $book->author_id }}</td>
<td>{{ $book->added_by }}</td>
<td>{{ $book->updated_by }}</td>
<td>{{ $book->price }}</td>
<td>{{ $book->discount }}</td>
<td>{{ $book->edition }}</td>
<td>{{ $book->language }}</td>
<td>{{ $book->publication_date }}</td>
<td>{{ $book->isbn }}</td>
<td>{{ $book->image }}</td>

<td>
<form action="{{ route('books.destroy',$book->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{{$books->links()}}
</body>
</html>

@endsection
