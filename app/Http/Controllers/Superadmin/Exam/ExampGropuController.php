<?php

namespace App\Http\Controllers\Superadmin\Exam;

use App\Http\Controllers\Controller;
use App\Models\Admin\Exam\Examgroup;
use App\Models\Admin\Exam\Examtype;
use Illuminate\Http\Request;

class ExampGropuController extends Controller
{
    public function examgroup()
    {
        $exam_groups = Examgroup::all();
        $exam_types = Examtype::all();
        // dd($exam_types);
        return view('superadmin.exam.view_exam_group',compact('exam_groups','exam_types'));
    }
    public function examGroupCreate()
    {
        $exam_types = Examtype::all();
        return view('superadmin.exam.exam_group',compact('exam_types'));
    }
    public function examGroupInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'exam_type' => 'required',
        ]);
        Examgroup::create([
            'name' => $request->input('name'),
            'exam_type' => $request->input('exam_type'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('examgroup');
    }
    public function examGroupEdit($id)
    {
        $exam_group = Examgroup::find($id);
        $exam_types = Examtype::all();
        return view('superadmin.exam.exam_group', compact('exam_group','exam_types'));
    }
    public function examGroupUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'exam_type' => 'required',
        ]);
        
        $exam_group = Examgroup::find($id);
        $exam_group->update([
            'name' => $request->input('name'),
            'exam_type' => $request->input('exam_type'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('examgroup');
    }
    public function examGroupDestroy($id)
    {
        $exam_group = Examgroup::find($id);
        $exam_group->delete();
        return redirect()->back();
    }    
}
