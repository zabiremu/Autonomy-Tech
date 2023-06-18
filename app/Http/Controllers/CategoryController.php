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
        $categories = Category::where('category_id', null)->latest()->get();

        return view('Frontend.category.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Frontend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        Category::create($request->all());

        return redirect()->route('category.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('Frontend.category.view', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('Frontend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        if($request->category_status == 1){
            $category= Category::find($category->id);
            $category->category_name= $request->category_name;
            $category->category_status= 1;
            $category->save();
        }else{
            $category= Category::find($category->id);
            $category->category_name= $request->category_name;
            $category->category_status= 0;
            $category->save();
        }
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index');
    }
}
