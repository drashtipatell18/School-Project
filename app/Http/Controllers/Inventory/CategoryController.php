<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;
use App\Models\Inventory\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function categorys()
    {
        $categorys = Category::all();
        return view('Inventory.view_category',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function categoryCreate()
    {
        return view('Inventory.create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function categoryInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required', 
        ]);
    
        $name = $request->input('name');
        $description = $request->input('description');
    
        // Create a new Category record
        $categorys = Category::create([
            'name' => $name,
            'description' => $description
        ]);
    
        return redirect()->route('categorys');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function categoryEdit($id)
    {
        $categorys = Category::find($id);
        return view('Inventory.create_category', compact('categorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function categoryUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required', 
        ]);

        $categorys = Category::find($id);

        $name = $request->input('name');
        $description = $request->input('description');
    
        // Create a new Category record
        $categorys->update([
            'name' => $name,
            'description' => $description
        ]);
    
        return redirect()->route('categorys');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function categoryDestroy($id)
    {
        $categorys = Category::find($id);
        $categorys->delete();
        return redirect()->back();
    }

}
