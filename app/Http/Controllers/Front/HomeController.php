<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Category;
use App\Models\Author;

class HomeController extends Controller
{



    public function index(){
        $books = Book::all()->random(8);
        $categories = Category::all();
        $authors = Author::all();
        return view('front.home', compact('books', 'categories', 'authors'));
    }

    public function filterBooks(Request $request){
        $categoryId = $request->input('category');
        $authorId = $request->input('author');

        $query = Book::query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($authorId) {
            $query->where('author_id', $authorId);
        }

        $books = $query->get();

        $categories = Category::all();
        $authors = Author::all();

        return view('front.home', compact('books', 'categories', 'authors'));
    }

}
