<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;
use App\Models\Inventory\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function stores()
    {
        $stores = Store::all();
        return view('Inventory.view_store',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function storeCreate()
    {
        return view('Inventory.create_store');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function storeInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|numeric',
            'description' => 'required', 
        ]);
    
        $name = $request->input('name');
        $code = $request->input('code');
        $description = $request->input('description');
    
        // Create a new Store record
        $stores = Store::create([
            'name' => $name,
            'code' => $code,
            'description' => $description
        ]);
    
        return redirect()->route('stores');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeEdit($id)
    {
        $stores = Store::find($id);
        return view('Inventory.create_store', compact('stores'));
    }

    /**
     * storeUpdate the form for editing the specified resource.
     */
    public function storeUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|numeric',
            'description' => 'required', 
        ]);
    
        $stores = Store::find($id);

        $name = $request->input('name');
        $code = $request->input('code');
        $description = $request->input('description');
        

        // Update ItemStock record
        $stores->update([
            'name' => $name,
            'code' => $code,
            'description' => $description
        ]);
    
        return redirect()->route('stores');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function storeDestroy($id)
    {
        $stores = Store::find($id);
        $stores->delete();
        return redirect()->back();
    }
}
