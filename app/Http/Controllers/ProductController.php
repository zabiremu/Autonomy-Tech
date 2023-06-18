<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products= Product::with('attributes','category')->latest()->get();
        return view('Frontend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category= Category::latest()->get();
        $attributes= Attribute::latest()->get();
        return view('Frontend.product.create',compact('attributes','category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'attributes_id'=>'required',
            'product_name'=>'required',
            'product_price'=>'required',
        ]);

        if($request->product_status == 1){
                foreach ($request->category_id as $item){
                $product_store= new Product();
                $product_store->category_id = $item;
                $product_store->attribute_id=  $request->attributes_id;
                $product_store->product_name=  $request->product_name;
                $product_store->price=  $request->product_price;
                $product_store->product_status=  1;
                $product_store->save();
                };
        }else{
            foreach ($request->category_id as $item){
                $product_store= new Product();
                $product_store->category_id = $item;
                $product_store->attribute_id=  $request->attributes_id;
                $product_store->product_name=  $request->product_name;
                $product_store->price=  $request->product_price;
                $product_store->product_status=  0;
                $product_store->save();
            };
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category= Category::latest()->get();
        $attributes= Attribute::latest()->get();
        $product= Product::with('attributes','category')->where('id',$id)->first();
        return view('Frontend.product.view',compact('product','attributes','category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category= Category::latest()->get();
        $attributes= Attribute::latest()->get();
        $product= Product::with('attributes','category')->where('id',$id)->first();
        return view('Frontend.product.edit',compact('product','attributes','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'category_id'=>'required',
            'attributes_id'=>'required',
            'product_name'=>'required',
            'product_price'=>'required',
        ]);

        if($request->product_status == 1){
            foreach ($request->category_id as $item){
                $product_store= Product::find($id);
                $product_store->category_id = $item;
                $product_store->attribute_id=  $request->attributes_id;
                $product_store->product_name=  $request->product_name;
                $product_store->price=  $request->product_price;
                $product_store->product_status=  1;
                $product_store->save();
            };
        }else{
            foreach ($request->category_id as $item){
                $product_store= Product::find($id);
                $product_store->category_id = $item;
                $product_store->attribute_id=  $request->attributes_id;
                $product_store->product_name=  $request->product_name;
                $product_store->price=  $request->product_price;
                $product_store->product_status=  0;
                $product_store->save();
            };
        }
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Product=Product::find($id);
        $Product->delete();

        return redirect()->route('products.index');
    }
}
