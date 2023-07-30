<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class ProductDetailsController extends Controller
{
    public function index($id)
    {
        $books = Book::findOrFail($id);
        return view('front.productDetails',compact('books'));
    }
}
