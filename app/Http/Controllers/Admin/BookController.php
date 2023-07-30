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

        $book = new Book;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->category_id = $request->category_id;
        $book->added_by = Auth::user()->name;
        $book->updated_by = 'NAN';
        $book->price = $request->price;
        $book->discount = $request->discount;
        $book->qty = $request->quantity;
        $book->edition = $request->edition;
        $book->language = $request->language;
        $book->publication_date = $request->publicationDate;
        $book->isbn = $request->isbn;

        $imageName = Carbon::now()->timestamp. '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $book->image = $imageName;

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
        $books = Book::findOrFail($id);
        $categories = Category::all();
        $authors = Author::all();
        return view('Admin.book.edit', compact('books','categories','authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->category_id = $request->category_id;
        $book->updated_by = Auth::user()->name;
        $book->price = $request->price;
        $book->discount = $request->discount;
        $book->qty = $request->quantity;
        $book->edition = $request->edition;
        $book->language = $request->language;
        $book->publication_date = $request->publicationDate;
        $book->isbn = $request->isbn;

        $imageName = Carbon::now()->timestamp. '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $book->image = $imageName;

        $book->save();

        $book->authors()->attach($request['author_id']);
        return redirect()->route('books.index')
        ->with('success','Book has been Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')
        ->with('success','Book has been deleted successfully.');
    }
}
