<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;

use App\Models\Admin\Subject;
use App\Models\Admin\SubjectGroup;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function subjects(){
        $subjects = Subject::all();
        return view('superadmin.academics.view_subject',compact('subjects'));
    }
    public function subjectCreate()
    {
        return view('superadmin.academics.create_subject');
    }
    public function subjectInsert(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'subject_type' => 'required',
        ]);
        Subject::create([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'subject_type' => $request->input('subject_type'),
        ]);
        return redirect()->route('subject');
    }
    public function subjectEdit($id)
    {
        $subject = Subject::find($id);
        return view('superadmin.academics.create_subject', compact('subject'));
    }
    public function subjectUpdate(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'subject_type' => 'required',
        ]);
    
        $subject = Subject::find($id);
        
        $code = $request->input('code');
        $name = $request->input('name');
        $subject_type = $request->input('subject_type');
    
        $subject->update([
            'code' => $code,
            'name' => $name,
            'subject_type' => $subject_type,
        ]);
    
        return redirect()->route('subject');
    }
    public function subjectDestroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->back();
    }
    
    public function subjectGroup(){
        $subjectgroups = SubjectGroup::all();
        return view('superadmin.academics.view_subject_group',compact('subjectgroups'));
    }
    public function subjecGroupCreate(){
        $subject = Subject::all();
        return view('superadmin.academics.create_subject_group',compact('subject'));

    } 
}
