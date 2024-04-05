<?php

namespace App\Http\Controllers\Superadmin\HumanResourse;

use App\Http\Controllers\Controller;
use App\Models\Admin\HumanResourse\ApproveLeaveRequest;
use App\Models\Admin\HumanResourse\LeaveType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApproveLeaveRequestController extends Controller
{
    public function approveLeaveRequest()
    {
        $approve_leave_request = ApproveLeaveRequest::all();
        return view('superadmin.humnaresourse.view_approve_leave_request',compact('approve_leave_request'));
    }

    public function getUsertype()
    {
        $roles = User::pluck('role')->unique();
        return response()->json(['roles' => $roles]);
    }

    public function getAllname(Request $request)
    {     
        $selectedrole = $request->input('role');
        $names = User::where('role',$selectedrole)->pluck('name')->toArray();
        return response()->json(['names' => $names]);
    }
    public function approveLeaveRequestCreate()
    {       
        $leave_types = LeaveType::pluck('name', 'name');
        return view('superadmin.humnaresourse.create_approve_leave_request',compact('leave_types'));
    }
    public function approveLeaveRequestInsert(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'apply_date' => 'required|date',
            'leave_type' => 'required',
            'leave_from_date' => 'required|date',
            'leave_to_date' => 'required|date',
            'reason' => 'required',
            'status' => 'required',
        ]);

        $filename = null;

        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');
        }
        ApproveLeaveRequest::create([
            'role' => $request->input('role'),
            'name' => $request->input('name'),
            'apply_date' => $request->input('apply_date'),
            'leave_type' => $request->input('leave_type'),
            'leave_from_date' => $request->input('leave_from_date'),
            'leave_to_date' => $request->input('leave_to_date'),
            'reason' => $request->input('reason'),
            'note' => $request->input('note'),
            'attach_document' => $filename,
            'status' => $request->input('status'),

        ]);
    
        return redirect()->route('approve.leave.request');
    }
    public function approveLeaveRequestEdit($id)
    {
        $approve_leave_request = ApproveLeaveRequest::find($id);
        $leave_types = LeaveType::pluck('name', 'name');
        return view('superadmin.humnaresourse.create_approve_leave_request',compact('approve_leave_request','leave_types'));
    }
    public function approveLeaveRequestUpdate(Request $request, $id)
    {
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'apply_date' => 'required|date',
            'leave_type' => 'required',
            'leave_from_date' => 'required|date',
            'leave_to_date' => 'required|date',
            'reason' => 'required',
            'status' => 'required',
        ]);

        $approve_leave_request = ApproveLeaveRequest::find($id);
        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');

            // Delete the old file if it exists
            if ($approve_leave_request->attach_document) {
                Storage::disk('public')->delete('attach_documents/' . $approve_leave_request->attach_document);
            }

            // Update the attach_document field with the new filename
            $approve_leave_request->attach_document = $filename;
        }
        $approve_leave_request->update([
            'role' => $request->input('role'),
            'name' => $request->input('name'),
            'apply_date' => $request->input('apply_date'),
            'leave_type' => $request->input('leave_type'),
            'leave_from_date' => $request->input('leave_from_date'),
            'leave_to_date' => $request->input('leave_to_date'),
            'reason' => $request->input('reason'),
            'note' => $request->input('note'),
            'status' => $request->input('status'),
    
        ]);
        return redirect()->route('approve.leave.request');
    }
    public function approveLeaveRequestDestroy($id)
    {
        $approve_leave_request = ApproveLeaveRequest::find($id);
        $approve_leave_request->delete();
        return redirect()->back();
    }
}
