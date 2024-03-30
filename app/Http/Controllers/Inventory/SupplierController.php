<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;
use App\Models\Inventory\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function suppliers()
    {
        $suppliers = Supplier::all();
        return view('Inventory.view_supplier',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function supplierCreate()
    {
        return view('Inventory.create_supplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function supplierInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email', 
            'address' => 'required', 
            'contact_person_name' => 'required', 
            'contact_person_phone' => 'required|numeric', 
            'contact_person_email' => 'required|email', 
            'description' => 'required', 
        ]);
    
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $contact_person_name = $request->input('contact_person_name');
        $contact_person_phone= $request->input('contact_person_phone');
        $contact_person_email = $request->input('contact_person_email');
        $description = $request->input('description');
    
        // Create a new Supplier record
        $supplier = Supplier::create([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'contact_person_name' => $contact_person_name,
            'contact_person_phone' => $contact_person_phone,
            'contact_person_email' => $contact_person_email,
            'description' => $description
        ]);
    
        return redirect()->route('suppliers');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function supplierEdit(Supplier $supplier,$id)
    {
        $supplier = Supplier::find($id);
        return view('Inventory.create_supplier', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function supplierUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email', 
            'address' => 'required', 
            'contact_person_name' => 'required', 
            'contact_person_phone' => 'required|numeric', 
            'contact_person_email' => 'required|email', 
            'description' => 'required', 
        ]);

        $supplier = Supplier::find($id);

        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $contact_person_name = $request->input('contact_person_name');
        $contact_person_phone= $request->input('contact_person_phone');
        $contact_person_email = $request->input('contact_person_email');
        $description = $request->input('description');
    
        // Create a new Supplier record
        $supplier->update([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'contact_person_name' => $contact_person_name,
            'contact_person_phone' => $contact_person_phone,
            'contact_person_email' => $contact_person_email,
            'description' => $description
        ]);
    
        return redirect()->route('suppliers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function supplierDestroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->back();
    }
}
