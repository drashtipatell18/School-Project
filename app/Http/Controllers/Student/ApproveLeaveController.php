<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clas;
use App\Models\Admin\Section;
use App\Models\Admin\StudentAdmission;
use App\Models\Student\Approveleave;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApproveLeaveController extends Controller
{
    public function approveLeave()
    {
        $class = Clas::all();
        $sections = Section::all();
        $students = StudentAdmission::all();
        $leaves = Approveleave::all();

        return view('superadmin.leave.approve_leave_view',compact('class','sections','students','leaves'));
    }
    
    public function approveLeaveCreate()
    {
        $class = DB::table('class')->get();
        $sections = Section::all();
        $students = StudentAdmission::all();

        return view('superadmin.leave.approve_leave',compact('class','sections','students'));
    }
    // public function getClasses()
    // {
    //     $classes = Clas::pluck('class');
    //     return response()->json(['classes' => $classes]);
    // }
    
    // public function getSections(Request $request)
    // {
    //     $selectedClass = $request->input('class');
    //     $sections = Clas::where('class', $selectedClass)->pluck('section')->toArray();
    //     return response()->json(['sections' => $sections]);
    // }    
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
    public function approveLeaveInsert(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'section' => 'required',
            'student' => 'required',
            'apply_date' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'reason' => 'required',
            'status' => 'required',
        ]);
        Approveleave::create([
            'class' => $request->input('class'),
            'section' => $request->input('section'),
            'student' => $request->input('student'),
            'apply_date' => $request->input('apply_date'),
            'from_date' => $request->input('from_date'),
            'to_date' => $request->input('to_date'),
            'reason' => $request->input('reason'),
            'status' => $request->input('status'),
        ]);
        // dd($request->all());
        return redirect()->route('approve.leave');

    }
    public function approveLeaveEdit($id)
    {
        $class = DB::table('class')->get();
        $sections = DB::table('class')->pluck('section')->toArray();
        // dd($sections);
        $students = StudentAdmission::all();
        $leave = Approveleave::find($id);
        return view('superadmin.leave.approve_leave', compact('class','sections','students','leave'));
    }

    public function approveLeaveUpdate(Request $request, $id)
        {
            $request->validate([
                'class' => 'required',
                'section' => 'required',
                'student' => 'required',
                'apply_date' => 'required',
                'from_date' => 'required',
                'to_date' => 'required',
                'reason' => 'required',
                'status' => 'required',
            ]);

            // dd($request->all());
            $leave = Approveleave::find($id);
            $leave->update([
                'class' => $request->input('class'),
                'section' => $request->input('section'),
                'student' => $request->input('student'),
                'apply_date' => $request->input('apply_date'),
                'from_date' => $request->input('from_date'),
                'to_date' => $request->input('to_date'),
                'reason' => $request->input('reason'),
                'status' => $request->input('status'),
            ]);
            return redirect()->route('approve.leave');
        }
        public function approveLeaveDestroy($id)
        {
            $leave = Approveleave::find($id);
            $leave->delete();
            return redirect()->back();
        }
}
