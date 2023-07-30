<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class BookControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $books = Book::orderBy('id', 'desc')->paginate(5);
            return response()->json(['data' => $books], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch books.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
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

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed.', 'errors' => $validator->errors()], 422);
            }

            $book = new Book;
            $book->title = $request->title;
            $book->description = $request->description;
            $book->category_id = $request->category_id;
            $book->price = $request->price;
            $book->discount = $request->discount;
            $book->qty = $request->quantity;
            $book->edition = $request->edition;
            $book->language = $request->language;
            $book->publication_date = $request->publication_date;
            $book->isbn = $request->isbn;

            if ($request->hasFile('image')) {
                $imageName = Carbon::now()->timestamp . '.' . $request->file('image')->extension();
                $request->file('image')->move(public_path('images'), $imageName);
                $book->image = $imageName;
            } else {
                $book->image = 'default_image.jpg';
            }

            $book->save();

            $book->authors()->attach($request->input('author_id'));

            return response()->json(['message' => 'Book created successfully.', 'data' => $book], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create book.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $book = Book::with(['authors'])->findOrFail($id);
            return response()->json(['data' => $book], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch book details.', 'error' => $e->getMessage()], 500);
        }
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
        try {
            $validator = Validator::make($request->all(), [
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

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed.', 'errors' => $validator->errors()], 422);
            }

            $book = Book::findOrFail($id);
            $book->title = $request->title;
            $book->description = $request->description;
            $book->category_id = $request->category_id;
            $book->price = $request->price;
            $book->discount = $request->discount;
            $book->qty = $request->quantity;
            $book->edition = $request->edition;
            $book->language = $request->language;
            $book->publication_date = $request->publication_date;
            $book->isbn = $request->isbn;

            if ($request->hasFile('image')) {
                $imageName = Carbon::now()->timestamp . '.' . $request->file('image')->extension();
                $request->file('image')->move(public_path('images'), $imageName);
                $book->image = $imageName;
            }

            $book->save();

            $book->authors()->sync($request->input('author_id'));

            return response()->json(['message' => 'Book updated successfully.', 'data' => $book], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update book.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();
            return response()->json(['message' => 'Book deleted successfully.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete book.', 'error' => $e->getMessage()], 500);
        }
    }

}
