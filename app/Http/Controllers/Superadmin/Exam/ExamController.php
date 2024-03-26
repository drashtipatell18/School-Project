<?php

namespace App\Http\Controllers\Superadmin\Exam;

use App\Http\Controllers\Controller;
use App\Models\Admin\Exam\Exam;
use App\Models\Admin\Exam\Examgroup;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function exam()
    {
        $exams = Exam::all();
        $exam_group_name = Examgroup::pluck('name');
        // dd($exam_group_name);

        return view('superadmin.exam.view_exam_name',compact('exams','exam_group_name'));
    }
    public function examCreate()
    {       
        $exam_group_name = Examgroup::pluck('name');
        
        return view('superadmin.exam.exam_name', compact('exam_group_name'));
    }
    
    public function examInsert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'exam_group' => 'required',
            'exam' => 'required',
        ]);
        Exam::create([
            'exam_group' => $request->input('exam_group'),
            'exam' => $request->input('exam'),
        ]);
        return redirect()->route('exam');

    }
    public function examEdit($id)
    {
        $exam = Exam::findOrFail($id);
        $exam_group_name = Examgroup::pluck('name');
    
        return view('superadmin.exam.exam_name', compact('exam', 'exam_group_name'));
    }
    public function examUpdate(Request $request, $id)
    {
        $request->validate([
            'exam_group' => 'required',
            'exam' => 'required',
        ]);

        // dd($request->all());
        $exam = Exam::find($id);
        $exam->update([
            'exam_group' => $request->input('exam_group'),
            'exam' => $request->input('exam'),
        ]);
        return redirect()->route('exam');
    }
    public function examDestroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();
        return redirect()->back();
    }
}
