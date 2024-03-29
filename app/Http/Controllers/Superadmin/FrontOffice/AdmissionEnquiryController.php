<?php

namespace App\Http\Controllers\Superadmin\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Admin\FrontOffice\AdmissionEnquiry;
use Illuminate\Http\Request;

class AdmissionEnquiryController extends Controller
{
    public function admissionEnquiry()
    {
        // echo 'sdfdsfs';exit;
        $admission_enquiry = AdmissionEnquiry::all();
       
        return view('superadmin.frontoffice.view_admission_enquiry',compact('admission_enquiry'));
    }
    public function admissionEnquiryCreate()
    {
        return view('superadmin.frontoffice.create_admission_enquiry');
    }
    public function admissionEnquiryInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'date' => 'required|date',
            'call_type' => 'required',
        ], [
            'call_type.required' => 'The Call Type field is required.',
        ]);

        AdmissionEnquiry::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'date' => $request->input('date'),
            'description' => $request->input('description'),
            'next_follow_up_date' => $request->input('next_follow_up_date'),
            'call_duration' => $request->input('call_duration'),
            'note' => $request->input('note'),
            'call_type' => $request->input('call_type'),
        ]);
        return redirect()->route('admission.enquiry');
    }
    public function admissionEnquiryEdit($id)
    {
        $admission_enquiry = AdmissionEnquiry::find($id);
        return view('superadmin.frontoffice.create_admission_enquiry', compact('admission_enquiry'));
    }
    public function admissionEnquiryUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'date' => 'required|date',
            'call_type' => 'required',
        ], [
            'call_type.required' => 'The Call Type field is required.',
        ]);
    
        $admission_enquiry = AdmissionEnquiry::find($id);
        
        $admission_enquiry->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'date' => $request->input('date'),
            'description' => $request->input('description'),
            'next_follow_up_date' => $request->input('next_follow_up_date'),
            'call_duration' => $request->input('call_duration'),
            'note' => $request->input('note'),
            'call_type' => $request->input('call_type'), // Use the input directly
        ]);
    
        return redirect()->route('admission.enquiry');
    }
    public function admissionEnquiryDestroy($id)
    {
        $admission_enquiry = AdmissionEnquiry::find($id);
        $admission_enquiry->delete();
        return redirect()->back();
    }
}
