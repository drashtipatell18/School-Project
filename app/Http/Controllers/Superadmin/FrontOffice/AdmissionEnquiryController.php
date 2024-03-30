<?php

namespace App\Http\Controllers\Superadmin\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clas;
use App\Models\Admin\FrontOffice\AdmissionEnquiry;
use App\Models\Admin\FrontOffice\Source;
use App\Models\Admin\Teacher;
use Illuminate\Http\Request;

class AdmissionEnquiryController extends Controller
{
    public function admissionEnquiry()
    {
        $admission_enquiry = AdmissionEnquiry::all();
        $teachers = Teacher::pluck('name', 'name');
        $class = Clas::pluck('class', 'class');
        $sources = Source::pluck('source', 'source');
        return view('superadmin.frontoffice.view_admission_enquiry',compact('admission_enquiry','teachers','class','sources'));
    }
    public function admissionEnquiryCreate()
    {
        $teachers = Teacher::pluck('name', 'name');
        $class = Clas::pluck('class', 'class');
        $sources = Source::pluck('source', 'source');
        // dd($source);
        return view('superadmin.frontoffice.create_admission_enquiry',compact('teachers','class','sources'));
    }
    public function admissionEnquiryInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'source' => 'required',
        ]);
        AdmissionEnquiry::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'description' => $request->input('description'),
            'note' => $request->input('note'),
            'date' => $request->input('date'),
            'next_follow_up_date' => $request->input('next_follow_up_date'),
            'assigned' => $request->input('staff'), // Change to 'staff' instead of 'assigned' if that's the correct field name
            'reference' => $request->input('reference'),
            'source' => $request->input('source'), // Corrected field name to 'source'
            'class' => $request->input('class'),
            'number_of_child' => $request->input('number_of_child'),
        ]);
    
        return redirect()->route('admission.enquiry');
    }
    
    public function admissionEnquiryEdit($id)
    {
        $admission_enquiry = AdmissionEnquiry::find($id);
        $teachers = Teacher::pluck('name', 'name');
        $class = Clas::pluck('class', 'class');
        $sources = Source::pluck('source', 'source');
        return view('superadmin.frontoffice.create_admission_enquiry', compact('admission_enquiry','teachers','class','sources'));
    }
    public function admissionEnquiryUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'source' => 'required',
        ]);
        $admission_enquiry = AdmissionEnquiry::find($id);
        
        $admission_enquiry->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'description' => $request->input('description'),
            'note' => $request->input('note'),
            'date' => $request->input('date'),
            'next_follow_up_date' => $request->input('next_follow_up_date'),
            'assigned' => $request->input('staff'), // Change to 'staff' instead of 'assigned' if that's the correct field name
            'reference' => $request->input('reference'),
            'source' => $request->input('source'), // Corrected field name to 'source'
            'class' => $request->input('class'),
            'number_of_child' => $request->input('number_of_child'),
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
