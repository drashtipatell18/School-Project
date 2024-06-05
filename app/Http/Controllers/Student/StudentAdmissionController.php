<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clas;
use App\Models\Admin\Exam\Exam;
use App\Models\Admin\Exam\Examgroup;
use App\Models\Admin\Exam\Schedule;
use App\Models\Admin\Section;
use App\Models\Admin\StudentAdmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class StudentAdmissionController extends Controller
{
    public function adminStudentDetails()
    {
        $students = StudentAdmission::all();
        // dd($students);
        $class = Clas::all();
        $sections = Section::all();
        return view('superadmin.StudentInformation.student_details_view',compact('students','class','sections'));
    }
    public function admission()
    {
        $student = StudentAdmission::all();
        $classes = Clas::pluck('class');
        $sections = Clas::pluck('section');
        return view('superadmin.StudentInformation.student_admission',compact('classes','sections','student'));
    }
    public function getClasses()
    {
        $classes = Clas::pluck('class')->unique();
        return response()->json(['classes' => $classes]);
    }
    
    public function getSections(Request $request)
    {
        $selectedClass = $request->input('class');
        $sections = Clas::where('class', $selectedClass)->pluck('section')->unique();
        return response()->json(['sections' => $sections]);
    }    
    public function StudentCreate()
    {       
      
        $classes = DB::table('class')->get();
        $sections = Section::pluck('section');
        
        return view('superadmin.StudentInformation.student_admission',compact('classes','sections'));
    }
    public function StudentInsert(Request $request)
    {
        if ($request->hasFile('student_photo')){
            $studentPhoto = $request->file('student_photo');
            $fileName = time() . '.' . $studentPhoto->getClientOriginalExtension();
            $studentPhoto->move('student_photo', $fileName);
        }

        if ($request->hasFile('father_photo')){
            $fatherPhoto = $request->file('father_photo');
            $fatherfileName = time() . '.' . $fatherPhoto->getClientOriginalExtension();
            $fatherPhoto->move('father_photo', $fatherfileName);
        }

        if ($request->hasFile('mother_photo')){
            $motherPhoto = $request->file('mother_photo');
            $motherfileName = time() . '.' . $motherPhoto->getClientOriginalExtension();
            $motherPhoto->move('mother_photo', $motherfileName);
        }

        $student = new StudentAdmission();
        $student->admissionno = $request->input('admissionno');
        $student->rollnumber = $request->input('rollnumber');
        $student->class = $request->input('class');
        $student->section = $request->input('section');
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->gender = $request->input('gender');
        $student->date_of_birth = $request->input('date_of_birth');
        $student->category = $request->input('category');
        $student->religion = $request->input('religion');
        $student->caste = $request->input('caste');
        $student->admission_date = $request->input('admission_date');
        $student->student_photo = $fileName;
        $student->blood_group = $request->input('blood_group');
        $student->height = $request->input('height');
        $student->weight = $request->input('weight');
        $student->address = $request->input('address');
        $student->medical_history = $request->input('medical_history');
        $student->father_name = $request->input('father_name');
        $student->father_phone = $request->input('father_phone');
        $student->father_occupation = $request->input('father_occupation');
        $student->father_email = $request->input('father_email');
        $student->father_photo = $fatherfileName;
        $student->mother_name = $request->input('mother_name');
        $student->mother_phone = $request->input('mother_phone');
        $student->mother_occupation = $request->input('mother_occupation');
        $student->mother_email = $request->input('mother_email');
        $student->mother_photo = $motherfileName;
        $student->save();

        return redirect()->route('student.details.view');

    }
    public function StudentEdit($id)
    {
        $student = StudentAdmission::find($id);
        $classes = Clas::pluck('class')->toArray();
        $sections = Clas::pluck('section')->toArray();
       
        return view('superadmin.StudentInformation.student_admission',compact('student','classes','sections'));
    }
    public function StudentUpdate(Request $request, $id)
    {
        $student = StudentAdmission::findOrFail($id);

        $student->admissionno = $request->input('admissionno');
        $student->rollnumber = $request->input('rollnumber');
        $student->class = $request->input('class');
        $student->section = $request->input('section');
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->gender = $request->input('gender');
        $student->date_of_birth = $request->input('date_of_birth');
        $student->category = $request->input('category');
        $student->religion = $request->input('religion');
        $student->caste = $request->input('caste');
        $student->admission_date = $request->input('admission_date');
        $student->blood_group = $request->input('blood_group');
        $student->height = $request->input('height');
        $student->weight = $request->input('weight');
        $student->address = $request->input('address');
        $student->medical_history = $request->input('medical_history');
        $student->father_name = $request->input('father_name');
        $student->father_phone = $request->input('father_phone');
        $student->father_occupation = $request->input('father_occupation');
        $student->father_email = $request->input('father_email');
        $student->mother_name = $request->input('mother_name');
        $student->mother_phone = $request->input('mother_phone');
        $student->mother_occupation = $request->input('mother_occupation');
        $student->mother_email = $request->input('mother_email');
  
        if ($request->hasFile('student_photo')) {
            $studentPhoto = $request->file('student_photo');
            $fileName = time() . '.' . $studentPhoto->getClientOriginalExtension();
            $studentPhoto->move('student_photo', $fileName);
    
            // Update user's image information in the database
            $student->student_photo = $fileName;
        } 
        
        if ($request->hasFile('father_photo')) {
            $fatherPhoto = $request->file('father_photo');
            $timestampedFather = time() . '.' . $fatherPhoto->getClientOriginalExtension();
            $fatherPhoto->move('father_photo', $timestampedFather);
    
            // Update user's image information in the database
            $student->father_photo = $timestampedFather;
        }
       
        if ($request->hasFile('mother_photo')) {
            $motherPhoto = $request->file('mother_photo');
            $timestampedMother = time() . '.' . $motherPhoto->getClientOriginalExtension();
            $motherPhoto->move('mother_photo', $timestampedMother);
            $student->mother_photo = $timestampedMother;
        }
        
        // Save the updated student record
        $student->save();

        // Redirect back or to a specific route
        return redirect()->route('student.details.view');
    }

    public function StudentDestroy($id)
        {
            $student = StudentAdmission::find($id);
            $student->delete();
            return redirect()->back();
        }

    public function profilepic(Request $request,$id)
    {     
        $student = StudentAdmission::find($id);
        $class = Clas::all();
        $sections = Section::all();
        return view('superadmin.StudentInformation.profilepic', compact('student', 'class', 'sections'));
    }
    public function parents(Request $request, $id)
    {
        $student = StudentAdmission::find($id);
        $class = Clas::all();
        $sections = Section::all();
        return view('superadmin.StudentInformation.parents', compact('student', 'class', 'sections'));
    }

        
    public function getImageByIdStud(Request $request)
    {
        $studentid = $request->input('id');
        $student = StudentAdmission::find($studentid);
        $photos = [];

        // Check if student data exists and has photos
        if ($student) {
            if ($student->student_photo) {
                $photos['student_photo'] = $student->student_photo;
            }

            if ($student->father_photo) {
                $photos['father_photo'] = $student->father_photo;
            }

            if ($student->mother_photo) {
                $photos['mother_photo'] = $student->mother_photo;
            }
        }

        return response()->json(['photos' => $photos]);
    }
}
