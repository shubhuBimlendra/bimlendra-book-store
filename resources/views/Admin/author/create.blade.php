@extends('admin.layout.master')

@section('content')

<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Author</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('authors.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Author Name:</strong>
<input type="text" name="name" class="form-control" placeholder="Author Name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
<strong>Nationality:</strong>
<input type="text" name="nationality" class="form-control" placeholder="Author Nationality">
@error('nationality')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
<strong>Phone Number:</strong>
<input type="text" name="phoneNumber" class="form-control" placeholder="Author Phone Number">
@error('phoneNumber')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
<strong>Date of Birth:</strong>
<input type="date" name="datOfBirth" class="form-control" placeholder="Author Date of birth">
@error('datOfBirth')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

</div>
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>

@endsection
