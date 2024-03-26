<?php

namespace App\Http\Controllers\Superadmin\Exam;

use App\Http\Controllers\Controller;
use App\Models\Admin\Exam\Examtype;
use App\Models\Admin\Exam\Examtype as ExamExamtype;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function examType()
    {
        $exam_types = Examtype::all();
        return view('superadmin.exam.view_exam_type',compact('exam_types'));
    }
    public function examtypeCreate()
    {
        return view('superadmin.exam.exam_type');
    }
    public function examtypeInsert(Request $request)
    {
        $request->validate([
            'exam_type' => 'required',
        ]);
        Examtype::create([
            'exam_type' => $request->input('exam_type'),
        ]);
        return redirect()->route('examtype');
    }
    public function examtypeEdit($id)
    {
        $exam_type = Examtype::find($id);
        return view('superadmin.exam.exam_type', compact('exam_type'));
    }
    public function examTtpeUpdate(Request $request, $id)
    {
        $request->validate([
            'exam_type' => 'required',
        ]);

        $exam_type = Examtype::find($id);
        $exam_type->update([
            'exam_type' => $request->input('exam_type'),
        ]);
        return redirect()->route('examtype');
    }
    public function examTypeDestroy($id)
    {
        $exam_type = Examtype::find($id);
        $exam_type->delete();
        return redirect()->back();
    }    
}
