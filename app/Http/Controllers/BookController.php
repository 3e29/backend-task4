<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::withTrashed()->get();
        return view("books.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.create', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'categories' => 'required|array',
        ]);

        // Create a new book record
        $book = Book::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'author_id' => $validatedData['author_id'],

        ]);

        // Attaching the selected categories to the book
        $book->categories()->attach($validatedData['categories']);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view("books.show", compact("book"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact('authors', 'categories', 'book'));
        // return view("books.edit", compact("book"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'author_id' => 'required|exists:authors,id',
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id'
        ]);

        $book->update($validated);
        $book->categories()->sync($validated['categories']);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }


    //force delete
    public function forceDelete($id)
    {
        $book = Book::withTrashed()->findOrFail($id);
        $book->forceDelete();
        return redirect()->route('books.index');
    }


    //restore
    public function restore($id)
    {
        $book = Book::withTrashed()->findOrFail($id);
        $book->restore();
        return redirect()->route('books.index');
    }
}
