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
        $data = Category::paginate(5);
       
        return view('category', compact('data'));
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
        $request->validate([
        'category_name' => 'required',
    ]);
    Category::create($request->all());
    
    return redirect('category');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category->validate([
            'category_name' => 'required',
        ]);
    
        $category->update([
            'category_name' => $category->input('category_name'),
        ]);
        return redirect('category')->with('success', 'Category updated successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('category');
    }
}
