<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::withTrashed()->get();
        return view("authors.index", compact("authors"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("authors.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2'
        ]);
        $author = new Author();
        $author->name = $request->name;
        $author->save();
        return redirect()->route("authors.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|min:2'
        ]);
        $author->update([
            "name" => $request->name
        ]);
        return redirect()->route("authors.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index');
    }


    //force delete
    public function forceDelete($id)
    {
        $author = Author::withTrashed()->findOrFail($id);
        $author->forceDelete();
        return redirect()->route('authors.index');
    }


    //restore
    public function restore($id)
    {
        $author = Author::withTrashed()->findOrFail($id);
        $author->restore();
        return redirect()->route('authors.index');
    }
}
