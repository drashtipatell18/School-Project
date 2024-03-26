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

        // dd($request->all());
        $request->validate([
            'from_title' => 'required',
            'address' => 'required',
            'to_title' => 'required',
            'date' => 'required|date',
        ]);

    
        PhoneCallLog::create([
            'from_title' => $request->input('from_title'),
            'reference_no' => $request->input('reference_no'),
            'address' => $request->input('address'),
            'note' => $request->input('note'),
            'to_title' => $request->input('to_title'),
            'date' => $request->input('date'),
            'attach_document' => $request->input('date'),
        ]);
        return redirect()->route('postal.receive');
    }
    public function phoneCallLogEdit($id)
    {
        $phone_call_log = PhoneCallLog::find($id);
        return view('superadmin.frontoffice.create_phone_call_log', compact('phone_call_log'));
    }
    public function phoneCallLogUpdate(Request $request, $id)
    {
            $request->validate([
                'from_title' => 'required',
                'address' => 'required',
                'to_title' => 'required',
                'date' => 'required|date',
            ]);

            $phone_call_log = PhoneCallLog::find($id);
       
            $phone_call_log->update([
            'from_title' => $request->input('from_title'),
            'reference_no' => $request->input('reference_no'),
            'address' => $request->input('address'),
            'note' => $request->input('note'),
            'to_title' => $request->input('to_title'),
            'date' => $request->input('date'),
            ]);
            return redirect()->route('postal.receive');
    }
    public function phoneCallLogDestroy($id)
    {
        $phone_call_log = PhoneCallLog::find($id);
        $phone_call_log->delete();
        return redirect()->back();
    }
}
