<?php

namespace App\Http\Controllers\Superadmin\Exam;

use App\Http\Controllers\Controller;
use App\Models\Admin\Exam\Examtype;
use App\Models\Admin\Exam\MarksGrade;
use Illuminate\Http\Request;

class MarksGradeController extends Controller
{
    public function marksGrade()
    {
        $marks_grades = MarksGrade::all();
        $exam_types = Examtype::all();
        // dd($exam_types);
        return view('superadmin.exam.view_marks_grade',compact('marks_grades','exam_types'));
    }
    public function marksGradeCreate()
    {
        $exam_types = Examtype::all();
        return view('superadmin.exam.marks_grade',compact('exam_types'));
    }
    public function marksGradeInsert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'exam_type' => 'required',
            'grade_name' => 'required',
            'percent_from' => 'required',
            'percent_upto' => 'required',
            'grade_point' => 'required',
        ]);
        MarksGrade::create([
            'exam_type' => $request->input('exam_type'),
            'grade_name' => $request->input('grade_name'),
            'percent_from' => $request->input('percent_from'),
            'percent_upto' => $request->input('percent_upto'),
            'grade_point' => $request->input('grade_point'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('marksgrade');
    }
    public function marksGradeEdit($id)
    {
        $marks_grade = MarksGrade::find($id);
        $exam_types = Examtype::all();
        return view('superadmin.exam.marks_grade', compact('marks_grade','exam_types'));
    }
    public function marksGradeUpdate(Request $request, $id)
    {
        $request->validate([
            'exam_type' => 'required',
            'grade_name' => 'required',
            'percent_from' => 'required',
            'percent_upto' => 'required',
            'grade_point' => 'required',
        ]);

        $marks_grade = MarksGrade::find($id);
        $marks_grade->update([
            'exam_type' => $request->input('exam_type'),
            'grade_name' => $request->input('grade_name'),
            'percent_from' => $request->input('percent_from'),
            'percent_upto' => $request->input('percent_upto'),
            'grade_point' => $request->input('grade_point'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('marksgrade');
    }
    public function marksGradeDestroy($id)
    {
        $marks_grade = MarksGrade::find($id);
        $marks_grade->delete();
        return redirect()->back();
    }    
}
