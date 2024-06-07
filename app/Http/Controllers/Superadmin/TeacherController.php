<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Teacher;
use App\Models\Admin\TeacherAssign;
use App\Models\Admin\Section;
use App\Models\Admin\Clas;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teachers()
    {
        $teachers = Teacher::all();
        $section = Section::pluck('section')->unique();
        return view('superadmin.academics.view_teacher', compact('teachers','section'));
    }

    public function teacherAssgin(){
        $teacherassign = TeacherAssign::all();
        return view('superadmin.academics.view_assgin_teacher',compact('teacherassign'));
    }

    public function teacherAssginCreate(){
        $teachers   = Teacher::pluck('name', 'name');
        return view('superadmin.academics.assgin_teacher',compact('teachers'));
    }

    public function teacherAssginInsert(Request $request)
    {
        $request->validate([
            'section' => 'required',
            'class' => 'required',
            'teacher' => 'required|array', 
        ]);
    
        $section = $request->input('section');
        $class = $request->input('class');
        $teachers = $request->input('teacher');
    
        // Convert the array of teachers into a comma-separated string
        $teachersString = implode(',', $teachers);

        $check = TeacherAssign::where('section', $request->input('section'));

        if($check->where('class', $request->input('class'))->count() != 0)
        {
            $teachers   = Teacher::pluck('name', 'name');
            return view('superadmin.academics.assgin_teacher', compact('teachers'))->with('error', '*Teacher is already assigned to this class/section');
        }
    
        // Create a new TeacherAssign record
        $teacherassign = TeacherAssign::create([
            'section' => $section,
            'class' => $class,
            'teacher' => $teachersString, // Use the converted string
        ]);
    
        return redirect()->route('teacherassign');
    }
    public function teacherAssginEdit($id)
    {
        $teachers   = Teacher::pluck('name', 'name');
        $teacherassign = TeacherAssign::find($id);
        return view('superadmin.academics.assgin_teacher', compact('teacherassign','teachers'));
    }

    public function teacherAssginUpdate(Request $request, $id)
    {
        $request->validate([
            'section' => 'required',
            'class' => 'required',
            'teacher' => 'required|array',
        ]);
        $teacherassign = TeacherAssign::find($id);
        
        $section = $request->input('section');
        $class = $request->input('class');
        $teachers = $request->input('teacher');
        $teachersString = implode(',', $teachers);
    
        $teacherassign->update([
            'section' => $section,
            'class' => $class,
            'teacher' => $teachersString, // Use the converted string
        ]);
        return redirect()->route('teacherassign');
    }

    public function teacherAssgindestroy($id)
    {
        $teacherassign = TeacherAssign::find($id);
        $teacherassign->delete();
        return redirect()->route('teacherassign');
    }
    public function getClasses()
    {
        $classes = Clas::pluck('class');
        return response()->json(['classes' => $classes]);
    }
    
    public function getSections(Request $request)
    {
        $selectedClass = $request->input('class');
        $sections = Clas::where('class', $selectedClass)->pluck('section');
        return response()->json(['sections' => $sections]);
    }    

    public function teacherCreate()
    {
        return view('superadmin.academics.create_teacher');
    }
    public function teacherInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Teacher::create([
            'name' => strtolower($request->input('name')),
        ]);
        // dd($request->all());
        return redirect()->route('teacher');
    }

    public function teacherEdit($id)
    {
        $teachers = Teacher::find($id);
        return view('superadmin.academics.create_teacher', compact('teachers'));
    }

    public function teacherUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $teachers = Teacher::find($id);
        $teachers->update([
            'name' => strtolower($request->input('name')),
        ]);
        return redirect()->route('teacher');
    }
    public function teacherDestroy($id)
    {
        $teachers = Teacher::find($id);
        $teachers->delete();
        return redirect()->back();
    }

    public function getTeachersAjax()
    {
        $teachers = Teacher::all();
        return response()->json(compact("teachers"), 200);
    }
}
