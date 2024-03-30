<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;

use App\Models\Inventory\Item;
use App\Models\Inventory\Category;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function items()
    {
        $items = Item::all();
        return view('Inventory.view_item',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function itemCreate()
    {
        $category   = Category::pluck('name', 'name');
        return view('Inventory.create_item',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function itemInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'unit' => 'required|numeric', 
            'description' => 'required', 
        ]);
    
        $name = $request->input('name');
        $category = $request->input('category');
        $unit= $request->input('unit');
        $description = $request->input('description');
    
        // Create a new Supplier record
        $items = Item::create([
            'name' => $name,
            'category' => $category,
            'unit' => $unit,
            'description' => $description
        ]);
    
        return redirect()->route('items');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function itemEdit($id)
    {
        $category   = Category::pluck('name', 'name');
        $items      = Item::find($id);
        return view('Inventory.create_item', compact('items','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function itemUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'unit' => 'required|numeric', 
            'description' => 'required', 
        ]);
        $items = Item::find($id);

        $name = $request->input('name');
        $category = $request->input('category');
        $unit= $request->input('unit');
        $description = $request->input('description');
    
        // Create a new Item record
        $items->update([
            'name' => $name,
            'category' => $category,
            'unit' => $unit,
            'description' => $description
        ]);
    
        return redirect()->route('items');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function itemDestroy($id)
    {
        $items = Item::find($id);
        $items->delete();
        return redirect()->back();
    }
}
