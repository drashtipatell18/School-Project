<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;

use App\Models\Inventory\ItemStock;
use App\Models\Inventory\Category;
use App\Models\Inventory\Item;
use App\Models\Inventory\Supplier;
use App\Models\Inventory\Store;
use Illuminate\Http\Request;

class ItemStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function itemstocks()
    {
        $itemstocks = ItemStock::all();
        return view('Inventory.view_itemstock',compact('itemstocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function itemstockCreate()
    {
        $suppliers = Supplier::pluck('name');
        $stores    = Store::pluck('name');
        return view('Inventory.create_itemstock',compact('suppliers','stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function itemstockInsert(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'item' => 'required',
            'supplier' => 'required',
            'store' => 'required', 
            'quantity' => 'required', 
            'price' => 'required|numeric', 
            'date' => 'required|date', 
            'description' => 'required', 
        ]);

        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');
        }
    
        // Create a new ItemStock record
        $itemstocks = ItemStock::create([
           'category'        => $request->input('category'),
            'item'           => $request->input('item'),
            'supplier'       => $request->input('supplier'),
            'store'          => $request->input('store'), 
            'quantity'       => $request->input('quantity'), 
            'price'          => $request->input('price'), 
            'date'           => $request->input('date'), 
            'attach_document'=> $filename, 
            'description'    => $request->input('description'), 
        ]);
    
        return redirect()->route('itemstocks');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function itemstockEdit($id)
    {
        $suppliers = Supplier::pluck('name');
        $stores    = Store::pluck('name');
        $itemstocks = ItemStock::find($id);
        return view('Inventory.create_itemstock', compact('itemstocks','suppliers','stores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function itemstockUpdate(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'item' => 'required',
            'supplier' => 'required',
            'store' => 'required', 
            'quantity' => 'required|numeric', 
            'price' => 'required|numeric', 
            'date' => 'required|date', 
            'description' => 'required', 
        ]);

        $itemstocks = ItemStock::find($id);

        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');

            // Delete the old file if it exists
            if ($itemstocks->attach_document) {
                Storage::disk('public')->delete('attach_documents/' . $itemstocks->attach_document);
            }

            // Update the attach_document field with the new filename
            $itemstocks->attach_document = $filename;
        }

        // Update a new ItemStock record
        $itemstocks->update([
           'category'        => $request->input('category'),
            'item'           => $request->input('item'),
            'supplier'       => $request->input('supplier'),
            'store'          => $request->input('store'), 
            'quantity'       => $request->input('quantity'), 
            'price'          => $request->input('price'), 
            'date'           => $request->input('date'), 
            'description'    => $request->input('description'), 
        ]);
    
        return redirect()->route('itemstocks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function itemstockDestroy($id)
    {
        $itemstocks = ItemStock::find($id);
        $itemstocks->delete();
        return redirect()->back();
    }

    public function getCategory()
    {
        $categorys = Category::pluck('name');
        return response()->json(['categorys' => $categorys]);
    }

    public function getItem(Request $request)
    {
        $selectedCategory = $request->input('class');
        $items = Item::where('category', $selectedCategory)->pluck('name');
        return response()->json(['items' => $items]);
    }   
}
