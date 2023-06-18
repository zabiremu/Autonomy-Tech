<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attributes = Attribute::latest()->get();

        return view('Frontend.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Frontend.Attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'attributes_name' => 'required',
            'attributes_list' => 'required',
        ]);
        if($request->attributes_status == 1) {
            $attributes = new Attribute();
            $attributes->attributes_name = $request->attributes_name;
            $attributes->attributes = $request->attributes_list;
            $attributes->attributes_status = 1;
            $attributes->save();
        }
        else{
            $attributes=new Attribute();
            $attributes->attributes_name= $request->attributes_name;
            $attributes->attributes= $request->attributes_list;
            $attributes->attributes_status= 0;
            $attributes->save();
        }

        return redirect()->route('attributes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attributes= Attribute::find($id);
        return view('Frontend.Attributes.view',compact('attributes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attributes= Attribute::find($id);
        return view('Frontend.Attributes.edit',compact('attributes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'attributes_name' => 'required',
            'attributes_list' => 'required',
        ]);
        if($request->attributes_status == 1) {
            $attributes = Attribute::find($id);
            $attributes->attributes_name = $request->attributes_name;
            $attributes->attributes = $request->attributes_list;
            $attributes->attributes_status = 1;
            $attributes->save();
        }
        else{
            $attributes=Attribute::find($id);
            $attributes->attributes_name= $request->attributes_name;
            $attributes->attributes= $request->attributes_list;
            $attributes->attributes_status= 0;
            $attributes->save();
        }

        return redirect()->route('attributes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attribute=Attribute::find($id);
        $attribute->delete();

        return redirect()->route('attributes.index');
    }
}
