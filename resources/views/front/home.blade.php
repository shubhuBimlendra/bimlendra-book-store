<!-- Navbar Start -->
@extends('front.layout.master')

@section('content')

            <div class="container-fluid pt-5">
                <!-- Filter Form -->
                <form action="{{ route('filter.books') }}" method="GET" class="mb-3">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <label for="category">Select Category:</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="author">Select Author:</label>
                                <select name="author" id="author" class="form-control">
                                    <option value="">All Authors</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary mt-4">Filter</button>
                            </div>
                        </div>
                    </form>

                    <div class="row px-xl-5 pb-3">
                        @foreach($books as $book)
                            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                                <!-- Book card content remains unchanged -->
                                <!-- ... -->
                            </div>
                        @endforeach
                    </div>
            </div>


            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Books</span></h2>
            </div>
            <div class="row px-xl-5 pb-3">
                @foreach($books as $book)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{asset('images')}}/{{$book->image}}" alt="{{$book->name}}">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$book->name}}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>£{{$book->price}}</h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{route('book.details',$book->id)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <form action="#">
                                <button type="Submit" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


@endsection
