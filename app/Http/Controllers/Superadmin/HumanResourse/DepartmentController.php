<?php

namespace App\Http\Controllers\Superadmin\HumanResourse;

use App\Http\Controllers\Controller;
use App\Models\Admin\HumanResourse\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function department()
    {
        $department = Department::all();
        return view('superadmin.humnaresourse.view_department',compact('department'));
    }
    public function departmentCreate()
    {       
        return view('superadmin.humnaresourse.create_department');
    }
    public function departmentInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        Department::create([
            'name' => $request->input('name'),
        ]);
    
        return redirect()->route('department');
    }
    
    public function departmentEdit($id)
    {
        $department = Department::find($id);
        return view('superadmin.humnaresourse.create_department', compact('department'));
    }
    public function departmentUpdate(Request $request, $id)
    {
            $request->validate([
                'name' => 'required',
            ]);

            $department = Department::find($id);
            $department->update([
                'name' => $request->input('name'),
     
            ]);
            return redirect()->route('department');
    }
    public function departmentDestroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->back();
    }
}
