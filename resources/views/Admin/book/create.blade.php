@extends('admin.layout.master')

@section('content')

<style>
    /* Custom styles for the select dropdown */
    .custom-select-wrapper {
        position: relative;
    }

    .custom-select {
        display: flex;
        align-items: center;
        cursor: pointer;
        border: 1px solid #ccc;
        padding: 8px;
        border-radius: 4px;
        min-width: 200px;
    }

    .custom-select .arrow-down {
        border: solid #333;
        border-width: 0 2px 2px 0;
        display: inline-block;
        padding: 2px;
        transform: rotate(45deg);
        margin-left: 5px;
    }

    .author-list {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        max-height: 150px;
        overflow-y: auto;
        z-index: 1;
        width: 100%;
        border-radius: 4px;
        margin-top: 5px;
    }

    .author-list.show {
        display: block;
    }

    .author-option {
        padding: 8px 12px;
        cursor: pointer;
    }

    .author-option:hover {
        background-color: #ddd;
    }

    .selected-option {
        flex: 1;
    }

    .selected-authors {
        margin-top: 5px;
    }

    .selected-authors .selected-author {
        display: inline-block;
        background-color: #e0e0e0;
        padding: 5px;
        margin-right: 5px;
        border-radius: 4px;
    }

    .selected-authors .remove-selected {
        cursor: pointer;
        color: red;
        margin-left: 5px;
    }
</style>

<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Book</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Book Title:</strong>
<input type="text" name="title" class="form-control" placeholder="Book Title">
@error('title')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
<strong>Description:</strong>
<input type="text" name="description" class="form-control" placeholder="Book description">
@error('description')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
<strong>Select Category:</strong>
<select class="form-control input-md" name="category_id">
    <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
</select>
@error('category_id')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
    <strong>Select Authors:</strong>
    <select class="form-control input-md" name="author_id[]" multiple>
        <option value="">Select Authors</option>
        @foreach($authors as $author)
            <option value="{{ $author->id }}">{{ $author->name }}</option>
        @endforeach
    </select>
    @error('author_id')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
</div>

<div id="selected-authors">
    <!-- Selected authors will be shown here -->
</div>

<div class="form-group">
<strong>Price:</strong>
<input type="text" name="price" class="form-control" placeholder="Price">
@error('price')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
<strong>Discount:</strong>
<input type="text" name="discount" class="form-control" placeholder="discount">
@error('discount')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
<strong>Edition:</strong>
<input type="text" name="edition" class="form-control" placeholder="edition">
@error('edition')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
<strong>Language:</strong>
<input type="text" name="language" class="form-control" placeholder="language">
@error('language')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
<strong>Publication Date:</strong>
<input type="date" name="publicationDate" class="form-control" placeholder="Publication Date">
@error('publicationDate')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
<strong>ISBN:</strong>
<input type="text" name="isbn" class="form-control" placeholder="isbn">
@error('isbn')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
<strong>Book Image:</strong>
<input type="file" class="input-file" name="image"/>
@error('image')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

</div>
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const selectElement = document.querySelector("select[name='author_id[]']");
    const selectedAuthorsContainer = document.getElementById("selected-authors");

    // Event listener to add selected authors to the container
    selectElement.addEventListener("change", function() {
        selectedAuthorsContainer.innerHTML = "";
        const selectedOptions = Array.from(selectElement.selectedOptions);
        selectedOptions.forEach(option => {
            const authorId = option.value;
            const authorName = option.textContent;
            const removeButton = document.createElement("button");
            removeButton.innerText = "Remove";
            removeButton.addEventListener("click", function() {
                option.selected = false;
                selectedAuthorsContainer.removeChild(authorElement);
            });

            const authorElement = document.createElement("div");
            authorElement.textContent = authorName;
            authorElement.appendChild(removeButton);
            selectedAuthorsContainer.appendChild(authorElement);
        });
    });
});
</script>







@endsection




