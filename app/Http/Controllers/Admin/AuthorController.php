<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors =Author::orderBy('id','desc')->paginate(5);
        return view('Admin.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nationality' => 'required',
            'phone_number' => 'string|max:20',
            'date_of_birth' => 'date',
            ]);

            $author = new Author;
            $author->name = $request->name;
            $author->nationality = $request->nationality;
            $author->phone_number = $request->phoneNumber;
            $author->date_of_birth = $request->datOfBirth;
            $author->save();
            return redirect()->route('authors.index')
            ->with('success','Author has been created successfully.');
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
        $authors = Author::findOrFail($id);
        return view('Admin.author.edit', compact('authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'nationality' => 'required',
            'phone_number' => 'string|max:20',
            'date_of_birth' => 'date',
            ]);

            $author = Author::findOrFail($id);
            $author->name = $request->name;
            $author->nationality = $request->nationality;
            $author->phone_number = $request->phoneNumber;
            $author->date_of_birth = $request->datOfBirth;
            $author->save();
            return redirect()->route('authors.index')
            ->with('success','Author has been Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect()->route('authors.index')
        ->with('success','Author has been deleted successfully.');
    }
}
