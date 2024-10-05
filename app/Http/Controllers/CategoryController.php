<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withTrashed()->get();
        return view("categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:50',
        ]);
        Category::create($validated);
        return redirect()->route("categories.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:50',
        ]);
        $category->update($validated);
        return redirect()->route("categories.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }

    //force delete
    public function forceDelete($id)
    {
        // dd('Force delete is called');
        $category = Category::withTrashed()->findOrFail($id);
        $category->forceDelete();
        return redirect()->route('categories.index');
    }


    //restore
    public function restore($id)
    {
        $categories = Category::withTrashed()->findOrFail($id);
        $categories->restore();
        return redirect()->route('categories.index');
    }
}
