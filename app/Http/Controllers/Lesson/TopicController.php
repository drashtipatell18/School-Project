<?php
namespace App\Http\Controllers\Lesson;
use App\Http\Controllers\Controller;
use App\Models\Admin\Lesson;
use App\Models\Admin\Clas;
use App\Models\Admin\Section;
use App\Models\Admin\Subject;
use App\Models\Admin\SubjectGroup;
use App\Models\Admin\Topic;

use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function topics(){
        $topics = Topic::all();
        return view('lesson.view_topic', compact('topics'));
    }
    public function topicCreate(){
        $subjectGroup = SubjectGroup::pluck('name', 'name');
        $subject = Subject::pluck('name', 'name');
        $lessons = Lesson::pluck('name', 'name');
        return view('lesson.create_topic', compact('subjectGroup','subject','lessons'));
    }
    

    public function topicInsert(Request $request) {
        $request->validate([
            'class' => 'required',
            'section' => 'required', 
            'subject' => 'required', 
            'subject_group' => 'required', 
            'lesson' => 'required', 
            'name' => 'required|array',
        ]);
        
        $class = $request->input('class');
        $section = $request->input('section');
        $subject = $request->input('subject');
        $lesson = $request->input('lesson');
        $subject_group = $request->input('subject_group');
        $names = $request->input('name'); 
        
        $lesson = Topic::create([
            'name' => implode(',', $names), 
            'class' => $class,
            'section' => $section,
            'subject' => $subject,
            'lesson' => $lesson,
            'subject_group' => $subject_group, 
        ]);
        
        return redirect()->route('topics');
    }
    public function topicEdit($id){
        $topic = Topic::find($id);
        $subjectGroup = SubjectGroup::pluck('name', 'name');
        $subject = Subject::pluck('name', 'name');
        $lessons = Lesson::pluck('name')->flatMap(function ($name) {
            return explode(', ', $name);
        })->toArray();
        $names = explode(', ', $topic->name);
        return view('lesson.create_topic', compact('topic','names','subjectGroup','subject','lessons'));
    }

    public function topicUpdate(Request $request, $id){
        $request->validate([
            'class' => 'required',
            'section' => 'required', 
            'subject' => 'required', 
            'subject_group' => 'required', 
            'lesson' => 'required', 
            'name' => 'required|array',
        ]);
        
        $class = $request->input('class');
        $section = $request->input('section');
        $subject = $request->input('subject');
        $subject_group = $request->input('subject_group');
        $lesson = $request->input('lesson');
        $names = $request->input('name'); 
        $topic = Topic::find($id);
        $topic->update([
            'name' => implode(',', $names), 
            'class' => $class,
            'section' => $section,
            'subject' => $subject,
            'subject_group' => $subject_group, 
        ]);
        
        return redirect()->route('topics');
    }
    public function lessonDestroy($id){
        $topic = Topic::find($id);
        $topic->delete();
        return redirect()->back();  
    }
}
