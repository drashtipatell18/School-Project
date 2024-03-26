<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Teacher;
use App\Models\Admin\Section;
use App\Models\Admin\Clas;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teachers()
    {
        $teachers = Teacher::all();
        $section = Section::pluck('section');
        return view('superadmin.academics.assign_class_teacher',compact('teachers','section'));
    }
    public function teacherCreate()
    {
        $teachers = Teacher::all();
        $class = Clas::pluck('class', 'class');
        // echo '<pre>';
        // print_r($class);
        // echo '</pre>';exit;
        return view('superadmin.academics.create_teacher',compact('teachers','class'));
    }
    public function teacherInsert(Request $request)
    {
        $request->validate([
            'teacher' => 'required',
        ]);
        Teacher::create([
            'teacher' => $request->input('teacher'),
        ]);
        // dd($request->all());
        return redirect()->route('teacher');

    }
}
