<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;
use App\Models\Inventory\IssueItems;
use App\Models\Inventory\Item;
use App\Models\User;
use App\Models\Inventory\Category;

use Illuminate\Http\Request;

class IssueItemController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function issueitems()
    {
        $issueitems = IssueItems::all();
        return view('Inventory.view_issueitem',compact('issueitems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function issueitemCreate ()
    {
        $roles   = User::pluck('name', 'name');
        return view('Inventory.create_issueitem',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function issueitemInsert(Request $request)
    {
        $request->validate([
            'usertype' => 'required',
            'issuedate' => 'required',
            'returndate' => 'required', 
            'quantity' => 'required', 
            'note' => 'required', 
            'category' => 'required', 
            'item' => 'required', 
        ]);
    
        $name = $request->input('name');
        $category = $request->input('category');
        $unit= $request->input('unit');
        $description = $request->input('description');
    
        // Create a new issueitems record
        $issueitems = IssueItems::create([
            'usertype' => $request->input('usertype'),
            'issueto' => $request->input('issueto'),
            'issueby' => $request->input('issueby'),
            'issuedate' => $request->input('issuedate'),
            'returndate' => $request->input('returndate'),
            'quantity' => $request->input('quantity'),
            'note' => $request->input('note'),
            'category' => $request->input('category'),
            'item' => $request->input('item'),
        ]);
    
        return redirect()->route('issueitems');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function issueitemEdit($id)
    {
        $roles   = User::pluck('role', 'role');
        $issueitems =  IssueItems::find($id);
        return view('Inventory.create_issueitem', compact('issueitems','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function issueitemUpdate(Request $request, $id)
    { 
        $request->validate([
            'usertype' => 'required',
            'issuedate' => 'required',
            'returndate' => 'required', 
            'quantity' => 'required', 
            'note' => 'required', 
            'category' => 'required', 
            'item' => 'required', 
        ]);
        $issueitems = IssueItems::find($id);
    
        // Create a new issueitems record
        $issueitems->update([
            'usertype' => $request->input('usertype'),
            'issueto' => $request->input('issueto'),
            'issueby' => $request->input('issueby'),
            'issuedate' => $request->input('issuedate'),
            'returndate' => $request->input('returndate'),
            'quantity' => $request->input('quantity'),
            'note' => $request->input('note'),
            'category' => $request->input('category'),
            'item' => $request->input('item'),
        ]);
    
        return redirect()->route('issueitems');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function issueitemDestroy($id)
    {
        $issueitems = IssueItems::find($id);
        $issueitems->delete();
        return redirect()->back();
    }

    public function getUsertype()
    {
        $roles = User::pluck('role');
        return response()->json(['roles' => $roles]);
    }

    public function getAllname(Request $request)
    {
        $selectedusertype = $request->input('class');
        $names = User::where('name', $selectedusertype)->pluck('name');
        return response()->json(['names' => $names]);
    }
}
