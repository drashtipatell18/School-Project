<?php

namespace App\Http\Controllers\Superadmin\HumanResourse;

use App\Http\Controllers\Controller;
use App\Models\Admin\HumanResourse\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    public function leaveType()
    {
        $leave_type = LeaveType::all();
        return view('superadmin.humnaresourse.view_leave_type',compact('leave_type'));
    }
    public function leaveTypeCreate()
    {       
        return view('superadmin.humnaresourse.create_leave_type');
    }
    public function leaveTypeInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        LeaveType::create([
            'name' => $request->input('name'),
        ]);
    
        return redirect()->route('leave.type');
    }
    public function leaveTypeEdit($id)
    {
        $leave_type = LeaveType::find($id);
        return view('superadmin.humnaresourse.create_leave_type', compact('leave_type'));
    }
    public function leaveTypeUpdate(Request $request, $id)
    {
            $request->validate([
                'name' => 'required',
            ]);

            $leave_type = LeaveType::find($id);
            $leave_type->update([
                'name' => $request->input('name'),
     
            ]);
            return redirect()->route('leave.type');
    }
    public function leaveTypeDestroy($id)
    {
        $leave_type = LeaveType::find($id);
        $leave_type->delete();
        return redirect()->back();
    }
}
