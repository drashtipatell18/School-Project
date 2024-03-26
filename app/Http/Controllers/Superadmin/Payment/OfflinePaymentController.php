<?php

namespace App\Http\Controllers\Superadmin\Payment;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clas;
use App\Models\Admin\OfflinePayment;
use App\Models\Admin\Section;
use App\Models\Admin\StudentAdmission;
use App\Models\Student\Homework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfflinePaymentController extends Controller
{
    public function studentOfflinepayment()
    {
        $payment = OfflinePayment::all();
        $class = Clas::all();
        $sections = Section::all();

        return view('superadmin.payments.view_offline_payment', compact('payment', 'class', 'sections'));
    }

    public function OfflinepaymentCreate()
    {
        $class = DB::table('class')->get();
        $sections = Section::all();
        // dd($sections);
        return view('superadmin.payments.offline_payment',compact('class','sections'));
    }
     
    public function getStudents(Request $request)
    {
        $selectedClass = $request->input('class');
        $selectedSection = $request->input('section'); 

        // Fetch sections associated with the selected class
        $sections = Clas::where('class', $selectedClass)->pluck('section')->toArray();
    
        $studentsQuery = StudentAdmission::where('class', $selectedClass);
    
        if ($selectedSection) {
            $studentsQuery->where('section', $selectedSection);
        }

        $uniqueSections = array_unique($sections);
    
        $students = $studentsQuery->pluck('first_name')->toArray();
    
        return response()->json(['sections' => $uniqueSections, 'students' => $students]);
    }
    public function getAdmissionNo(Request $request)
    {
        $selectedClass = $request->input('class');
        $selectedSection = $request->input('section');
    
        // Fetch admission numbers associated with the selected class and section
        $admissionNumbersQuery = StudentAdmission::where('class', $selectedClass);
    
        if ($selectedSection) {
            $admissionNumbersQuery->where('section', $selectedSection);
        }
    
        $admissionNumbers = $admissionNumbersQuery->pluck('admissionno')->toArray();
    
        return response()->json(['admissionNumbers' => $admissionNumbers]);
    }

    public function OfflinepaymentInsert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'class' => 'required',
            'section' => 'required',
            'student' => 'required',
            'payment_date' => 'required',
            // 'submit_date' => 'required',
            'amount' => 'required',
            'reference' => 'required',
            'comment' => 'required',
            'payment_mode' => 'required',
            'status' => 'required',
        ]);
        $submitDate = $request->input('submit_date_date') . ' ' . $request->input('submit_date_time');
            OfflinePayment::create([
            'admissionno' => $request->input('admissionno'),
            'class' => $request->input('class'),
            'section' => $request->input('section'),
            'student' => $request->input('student'),
            'payment_date' => $request->input('payment_date'),
            'submit_date' => $submitDate,
            'amount' => $request->input('amount'),
            'reference' => $request->input('reference'),
            'comment' => $request->input('comment'),
            'payment_mode' => $request->input('payment_mode'),
            'status' => $request->input('status'),
        ]);

    return redirect()->route('offlinepayment');
 }
    public function OfflinepaymentEdit($id)
    {
        $class = DB::table('class')->get();
        $sections = DB::table('class')->pluck('section')->toArray();
        $payment = OfflinePayment::find($id);
        return view('superadmin.payments.offline_payment', compact('payment','class','sections'));
    }

    public function OfflinepaymentUpdate(Request $request, $id)
        {
            $request->validate([
                'class' => 'required',
                'section' => 'required',
                'student' => 'required',
                'payment_date' => 'required',
                // 'submit_date' => 'required',
                'amount' => 'required',
                'reference' => 'required',
                'comment' => 'required',
                'payment_mode' => 'required',
                'status' => 'required',
    
            ]);

            $submitDate = $request->input('submit_date_date') . ' ' . $request->input('submit_date_time');
            
            $payment = OfflinePayment::find($id);
            $payment->update([
                'class' => $request->input('class'),
                'section' => $request->input('section'),
                'student' => $request->input('student'),
                'payment_date' => $request->input('payment_date'),
                'submit_date' => $submitDate,
                'amount' => $request->input('amount'),
                'reference' => $request->input('reference'),
                'comment' => $request->input('comment'),
                'payment_mode' => $request->input('payment_mode'),
                'status' => $request->input('status'),
            ]);
            return redirect()->route('offlinepayment');
        }
        public function OfflinepaymentDestroy($id)
        {
            $payment = OfflinePayment::find($id);
            $payment->delete();
            return redirect()->back();
        }
}
