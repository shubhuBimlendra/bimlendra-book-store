<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Support\Carbon;

use Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Book::orderBy('id','desc')->paginate(5);
        return view('Admin.book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('Admin.book.create',compact('categories','authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|array',
            'author_id.*' => 'exists:authors,id',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'edition' => 'nullable|string|max:100',
            'language' => 'nullable|string|max:100',
            'publication_date' => 'nullable|date',
            'isbn' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('book_images', 'public');
        }
        $book = new Book;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->category_id = $request->category_id;
        $book->added_by = $user;
        $book->updated_by = $user;
        $book->price = $request->price;
        $book->discount = $request->discount;
        $book->edition = $request->edition;
        $book->language = $request->language;
        $book->publication_date = $request->publicationDate;
        $book->isbn = $request->isbn;
        if (isset($imagePath)) {
            $book->image = $imagePath;
        }
        $book->save();

        $book->authors()->attach($request['author_id']);
        return redirect()->route('books.index')
        ->with('success','Book has been created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
