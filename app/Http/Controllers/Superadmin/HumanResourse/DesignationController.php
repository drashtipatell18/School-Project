<?php

namespace App\Http\Controllers\Superadmin\HumanResourse;

use App\Http\Controllers\Controller;
use App\Models\Admin\HumanResourse\Designation;
use Illuminate\Http\Request;
class DesignationController extends Controller
{
    public function designation()
    {
        $designation = Designation::all();
        return view('superadmin.humnaresourse.view_designation',compact('designation'));
    }
    public function designationCreate()
    {       
        return view('superadmin.humnaresourse.create_designation');
    }
    public function designationInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        Designation::create([
            'name' => $request->input('name'),
        ]);
    
        return redirect()->route('designation');
    }
    
    public function designationEdit($id)
    {
        $designation = Designation::find($id);
        return view('superadmin.humnaresourse.create_designation', compact('designation'));
    }
    public function designationUpdate(Request $request, $id)
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
    public function designationDestroy($id)
    {
        $designation = Designation::find($id);
        $designation->delete();
        return redirect()->back();
    }
}
