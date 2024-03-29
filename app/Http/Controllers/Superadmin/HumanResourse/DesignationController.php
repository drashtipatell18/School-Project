<?php

namespace App\Http\Controllers\Superadmin\HumanResourse;

use App\Http\Controllers\Controller;
use App\Models\Admin\HumanResourse\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function class()
    {
        $designation = Designation::all();
        return view('superadmin.academics.view_class',compact('designation'));
    }
    public function classCreate()
    {       
        $designation = Designation::all();

        return view('superadmin.academics.create_class', compact('designation'));
    }
    public function classInsert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            
        ]);
        Designation::create([
            'name' => $request->input('name'),
            
        ]);
        return redirect()->route('designation');

    }
 
    public function classEdit($id)
    {
        $designation = Designation::find($id);
    
        return view('superadmin.academics.create_class', compact('designation'));
    }
    public function classUpdate(Request $request, $id)
    {
            $request->validate([
                'name' => 'required',
    
            ]);

            $designation = Designation::find($id);
            $designation->update([
                'name' => $request->input('name'),
     
            ]);
            return redirect()->route('designation');
     }
        public function classDestroy($id)
        {
            $designation = Designation::find($id);
            $designation->delete();
            return redirect()->back();
        }
}
