<?php

namespace App\Http\Controllers\Superadmin\Exam;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clas;
use App\Models\Admin\Exam\Exam;
use App\Models\Admin\Exam\Examgroup;
use App\Models\Admin\Exam\ResultExam;
use App\Models\Admin\Exam\Schedule;
use App\Models\Admin\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LDAP\Result;

class ResultController extends Controller
{
    public function result()
    {
        $results = ResultExam::all();
        // dd($results);
        $exams = Exam::all();
        $examGroups = Schedule::pluck('exam_group');
        return view('superadmin.exam.view_exam_result',compact('examGroups','results','exams'));
    }
    public function getGroupsRsult()
    {
        $examGroups = Schedule::pluck('exam_group')->unique();
        return response()->json(['exam_groups' => $examGroups]);
    }
    
    public function getExamResult(Request $request)
    {
        $selectedExamGroups = $request->input('exam_group');
        // dd($selectedExamGroups);
        $exams = Schedule::where('exam_group', $selectedExamGroups)->pluck('exam')->unique();
        // dd($exams);
        return response()->json(['exams' => $exams]);
    }
   
    public function resultCreate()
    {
        
        $class = DB::table('class')->get();
        // $subjects = Schedule::all();

        // Fetch students data and pass it to the view
        $students = []; // You need to modify this to fetch actual student data from your database
        return view('superadmin.exam.exam_result', compact('class','students'));
    }

    public function getStudents(Request $request)
    {
        $selectedClass = $request->input('class');
        $selectedSection = $request->input('section'); 

        // Fetch sections associated with the selected class
        $sections = Clas::where('class', $selectedClass)->pluck('section')->toArray();

        $studentsQuery = ResultExam::where('class', $selectedClass);

        if ($selectedSection) {
            $studentsQuery->where('section', $selectedSection);
        }

        $uniqueSections = array_unique($sections);

        $students = $studentsQuery->select('id', 'first_name')->get()->toArray();
        // dd($students);

        return response()->json(['sections' => $uniqueSections, 'students' => $students]);
    }

    public function getExamGroupsAndSubjects(Request $request)
    {
        $selectedExamGroup = $request->input('exam_group');
        $selectedExam = $request->input('exam');

        // Fetch exams associated with the selected exam_group
        $exams = Schedule::where('exam_group', $selectedExamGroup)->pluck('exam')->toArray();

        $subjectsQuery = Schedule::where('exam_group', $selectedExamGroup);

        if ($selectedExam) {
            $subjectsQuery->where('exam', $selectedExam);
        }

        $uniqueExams = array_unique($exams);

        $subjects = $subjectsQuery->pluck('subject')->toArray();

        return response()->json(['exams' => $uniqueExams, 'subjects' => $subjects]);
    }
    public function resultInsert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'exam_group' => 'required',
            'exam' => 'required',
            'class' => 'required',
            'section' => 'required',
            'student_name' => 'required',
            'subject' => 'required',
            'marks' => 'required',
            'grand_total' => 'required',
            'percent' => 'required',
            'rank' => 'required',
            'result' => 'required',
        ]);

        $subjects = $request->input('subject');
        
    $subjectJson = json_encode($request->input('subject'));

        $marks = $request->input('marks');
    // Convert marks array into JSON
    $marksJson = json_encode($request->input('marks'));

    // Create the ResultExam instance
    ResultExam::create([
        'exam_group' => $request->input('exam_group'),
        'exam' => $request->input('exam'),
        'class' => $request->input('class'),
        'section' => $request->input('section'),
        'student' => $request->input('student'),
        'subject' => $subjectJson,
        'marks' => $marksJson, // Store the JSON-encoded marks array
        'grand_total' => $request->input('grand_total'),
        'percent' => $request->input('percent'),
        'rank' => $request->input('rank'),
        'result' => $request->input('result'),
    ]);

 

        return redirect()->back();
    }
    public function resultEdit($id)
    {
        $result = ResultExam::find($id);
        return view('superadmin.exam.exam_result', compact('result'));
    }

    public function resultUpdate(Request $request, $id)
    {
        // $request->validate([
        //     'exam_group' => 'required',
        //     'exam' => 'required',
        //     'class' => 'required',
        //     'section' => 'required',
        //     'student_name' => 'required',
        //     'subject' => 'required',
        //     'marks' => 'required',
        //     'grand_total' => 'required',
        //     'percent' => 'required',
        //     'rank' => 'required',
        //     'result' => 'required',
        // ]);
        $marks = json_decode($request->input('marks'));
        $result = ResultExam::find($id);
        $result->update([
            'exam_group' => $request->input('exam_group'),
            'exam' => $request->input('exam'),
            'class' => $request->input('class'),
            'section' => $request->input('section'),
            'student' => $request->input('student'),
            'subject' => $request->input('subject'),
            'marks' => $marks,
            'grand_total' => $request->input('grand_total'),
            'percent' => $request->input('percent'),
            'rank' => $request->input('rank'),
            'result' => $request->input('result'),
        ]);
        return redirect()->route('result');
    }
    public function resultDestroy($id)
    {
        $result = ResultExam::find($id);
        $result->delete();
        return redirect()->back();
    }    
}
