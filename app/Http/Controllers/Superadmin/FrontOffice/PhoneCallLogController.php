<?php

namespace App\Http\Controllers\Superadmin\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Admin\FrontOffice\PhoneCallLog;
use Illuminate\Http\Request;

class PhoneCallLogController extends Controller
{
    public function phoneCallLog()
    {
        $phone_call_log = PhoneCallLog::all();
       
        return view('superadmin.frontoffice.view_phone_call_log',compact('phone_call_log'));
    }
    public function phoneCallLogCreate()
    {
        return view('superadmin.frontoffice.create_phone_call_log');
    }
    public function phoneCallLogInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'date' => 'required|date',
            'call_type' => 'required',
        ], [
            'call_type.required' => 'The Call Type field is required.',
        ]);

        PhoneCallLog::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'date' => $request->input('date'),
            'description' => $request->input('description'),
            'next_follow_up_date' => $request->input('next_follow_up_date'),
            'call_duration' => $request->input('call_duration'),
            'note' => $request->input('note'),
            'call_type' => $request->input('call_type'),
        ]);
        return redirect()->route('phone.call.log');
    }
    public function phoneCallLogEdit($id)
    {
        $phone_call_log = PhoneCallLog::find($id);
        return view('superadmin.frontoffice.create_phone_call_log', compact('phone_call_log'));
    }
    public function phoneCallLogUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'date' => 'required|date',
            'call_type' => 'required',
        ], [
            'call_type.required' => 'The Call Type field is required.',
        ]);
    
        $phone_call_log = PhoneCallLog::find($id);
        
        $phone_call_log->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'date' => $request->input('date'),
            'description' => $request->input('description'),
            'next_follow_up_date' => $request->input('next_follow_up_date'),
            'call_duration' => $request->input('call_duration'),
            'note' => $request->input('note'),
            'call_type' => $request->input('call_type'), // Use the input directly
        ]);
    
        return redirect()->route('phone.call.log');
    }
    public function phoneCallLogDestroy($id)
    {
        $phone_call_log = PhoneCallLog::find($id);
        $phone_call_log->delete();
        return redirect()->back();
    }
}
