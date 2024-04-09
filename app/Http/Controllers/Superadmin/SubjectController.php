<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;

use App\Models\Admin\Subject;
use App\Models\Admin\Section;
use App\Models\Admin\Clas;
use App\Models\Admin\Lesson;
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
            'subject_type' => 'required|in:Practical,Theory',
        ]);
        Subject::create([
            'code' => $request->input('code'),
            'name' => strtolower($request->input('name')),
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
        $name = strtolower($request->input('name'));
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

    public function getSubjectGroup(Request $request) {
        $selectedClass = $request->input('class');
        $selectedSection = $request->input('section');

        // Fetch sections associated with the selected class
        $sections = Clas::where('class', $selectedClass)->pluck('section')->toArray();

        // Start building the query to retrieve subject groups
        $subjectsQuery = SubjectGroup::where('class', $selectedClass);
        if ($selectedSection) {
            $subjectsQuery->where('section', $selectedSection);
        }

        $uniqueSections = array_unique($sections);
        $subjectGroups = $subjectsQuery->pluck('name')->toArray();
            return response()->json(['sections' => $uniqueSections, 'subjectGroups' => $subjectGroups]);
    }
    
    public function getSubject(Request $request) {
        $selectedClass = $request->input('class'); 
        $selectedSubjectGroup = $request->input('subject_group');
         
        // Retrieve subjects based on the query
        $subjects = Subject::pluck('name');

        // If a subject group is selected, add it as a condition to the query
        if ($selectedSubjectGroup) {
            $subjects->where('subject_group', $selectedSubjectGroup);
        }
    
        // If a section is selected, add it as a condition to the query
        if ($selectedClass) {
            $subjects->where('class', $selectedClass);
        }

        return response()->json(['subjects' => $subjects]);
    }
    
    public function getLesson(Request $request) {
        $selectedClass = $request->input('class');
        $lessonsQuery = Lesson::query();
        if ($selectedClass) {
            $lessonsQuery->where('class', $selectedClass); 
        }    
        $lessons = $lessonsQuery->pluck('name')->flatMap(function ($name) {
            return explode(', ', $name);
        })->toArray();
        
        return response()->json(['lessons' => $lessons]);
    }
    
    
    public function lessonEdit($id){
        $lesson = Lesson::find($id);
        return view('lesson.create_lesson', compact('lesson'));
    }
    public function lessonUpdate(Request $request, $id){
        $request->validate([
            'class' => 'required',
            'section' => 'required', 
            'subject' => 'required', 
            'name' => 'required|array',
        ]);
        
        $class = $request->input('class');
        $section = $request->input('section');
        $subject = $request->input('subject');
        $subjectgroup = $request->input('subjectgroup');
        $names = $request->input('name'); 
        $lesson = Lesson::find($id);
        $lesson->update([
            'name' => implode(',', $names), 
            'class' => $class,
            'section' => $section,
            'subject' => $subject,
            'subject_group' => $subjectgroup, 
        ]);
        
        return redirect()->route('lessons');
    }
    public function lessonDestroy($id){
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect()->back();  
    }
}
