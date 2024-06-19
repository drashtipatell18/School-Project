<?php
namespace App\Http\Controllers\Lesson;
use App\Http\Controllers\Controller;
use App\Models\Admin\Lesson;
use App\Models\Admin\Subject;
use App\Models\Admin\SubjectGroup;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function lessons(){
        $lessons = Lesson::all();
        return view('lesson.view_lesson', compact('lessons'));

    }
    public function lessonCreate(){
        return view('lesson.create_lesson');
    }
    public function lessonInsert(Request $request) {
        $request->validate([
            'class' => 'required',
            'section' => 'required', 
            'subject_group' => 'required', 
            'subject' => 'required', 
            'name' => 'required|array',
        ]);
        $class = $request->input('class');
        $section = $request->input('section');
        $subject_group = $request->input('subject_group');
        $subject = $request->input('subject');
        $names = $request->input('name'); 
       
        $lesson = Lesson::create([
            'name' => implode(', ', $names),
            'class' => $class,
            'section' => $section,
            'subject_group' => $subject_group, 
            'subject' => $subject,
        ]);
        return redirect()->route('lessons');
    }
    public function lessonEdit($id){
        $lesson = Lesson::find($id);
        $subjectGroup = SubjectGroup::pluck('name', 'name');
        $subject = Subject::pluck('name', 'name');
        $names = explode(', ', $lesson->name);
        return view('lesson.create_lesson', compact('lesson','names','subject','subjectGroup'));
    }
    public function lessonUpdate(Request $request, $id){
        $request->validate([
            'class' => 'required',
            'section' => 'required', 
            'subject' => 'required', 
            'subject_group' => 'required', 
            'name' => 'required|array',
        ]);
        $class = $request->input('class');
        $section = $request->input('section');
        $subject = $request->input('subject');
        $subject_group = $request->input('subject_group');
        $names = $request->input('name'); 
        $lesson = Lesson::find($id);
        $lesson->update([
            'name' => implode(',', $names), 
            'class' => $class,
            'section' => $section,
            'subject' => $subject,
            'subject_group' => $subject_group, 
        ]);
        
        return redirect()->route('lessons');
    }
    public function lessonDestroy($id){
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect()->back();  
    }
}
