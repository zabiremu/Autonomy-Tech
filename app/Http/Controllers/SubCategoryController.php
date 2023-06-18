<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = Category::with('category')->where('category_id', '!=', null)->latest()->get();
      //  dd($subCategories);
        return view('Frontend.subCategory.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category= Category::latest()->get();
        return view('Frontend.subCategory.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subCategory_name' => 'required',
            'category_id' => 'required',
        ]);
        if($request->subCategory_status == 1) {
            $subcategory = new Category();
            $subcategory->category_id = $request->category_id;
            $subcategory->category_name = $request->subCategory_name;
            $subcategory->category_status = 1;
            $subcategory->save();
        }
        else{
            $subcategory=new Category();
            $subcategory->category_id = $request->category_id;
            $subcategory->category_name= $request->subCategory_name;
            $subcategory->category_status= 0;
            $subcategory->save();
        }
        return redirect()->route('subCategory.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category= Category::latest()->get();
        $subCategory = Category::findOrFail($id);
        return view('Frontend.subCategory.view', compact('subCategory','category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category= Category::latest()->get();
        $subCategory = Category::findOrFail($id);
        return view('Frontend.subCategory.edit', compact('subCategory','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'subCategory_name' => 'required',
            'category_id' => 'required',
        ]);
        if($request->subCategory_status == 1) {
            $subcategory = Category::find($id);
            $subcategory->category_id = $request->category_id;
            $subcategory->category_name = $request->subCategory_name;
            $subcategory->category_status = 1;
            $subcategory->save();
        }
        else{
            $subcategory=Category::find($id);
            $subcategory->category_id = $request->category_id;
            $subcategory->category_name= $request->subCategory_name;
            $subcategory->category_status= 0;
            $subcategory->save();
        }
        return redirect()->route('subCategory.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory=Category::find($id);
        $subcategory->delete();

        return redirect()->route('subCategory.index');
    }
}
