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
        $subject   = Subject::pluck('name', 'name');
        return view('superadmin.academics.create_subject_group',compact('subject'));

    } 

    public function subjecGroupInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'section' => 'required', 
            'subject' => 'required|array', 
            'description' => 'required', 
        ]);
        $name = $request->input('name');
        $class = $request->input('class');
        $section = $request->input('section');
        $subjects = $request->input('subject');
        $subjectsString = implode(',', $subjects);

        $description = $request->input('description');
    
        $subjectgroup = SubjectGroup::create([
            'name' => $name,
            'class' => $class,
            'section' => $section,
            'subject' => $subjectsString,
            'description' => $description,
        ]);
    
        return redirect()->route('subjectgroup');
    }
    public function subjecGroupEdit($id)
    {
        $subject   = Subject::pluck('name', 'name');
        $subjectgroup = SubjectGroup::find($id);
        return view('superadmin.academics.create_subject_group', compact('subjectgroup','subject'));
    }
    public function subjecGroupUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'section' => 'required',
            'subject' => 'required|array',
            'description' => 'required',
        ]);
        $subjectgroup = SubjectGroup::find($id);
        
        $name = $request->input('name');
        $class = $request->input('class');
        $section = $request->input('section');
        $subjects = $request->input('subject');
        $subjectsString = implode(',', $subjects);
        $description = $request->input('description');

        $subjectgroup->update([
            'name' => $name,
            'class' => $class,
            'section' => $section,
            'subject' => $subjectsString,
            'description' => $description,
        ]);
      
        return redirect()->route('subjectgroup');
    }

    public function subjecGroupDestroy($id)
    {
        $subjectgroup = SubjectGroup::find($id);
        $subjectgroup->delete();
        return redirect()->back();
    }
}
