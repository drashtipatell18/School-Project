<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use App\Models\Admin\ClassTimeTable;
use App\Models\Admin\Clas;
use App\Models\Admin\SubjectGroup;
use App\Models\Admin\Subject;

use Illuminate\Http\Request;

class ClassTimeTableController extends Controller
{
    public function classTimetable()
    {
        $classtimetables = ClassTimeTable::all();
        return view('superadmin.academics.view_classtimetables',compact('classtimetables'));
    }
    public function classTimetableCreate(){
        return view('superadmin.academics.create_classtimetables');
    }
    public function classTimetableInsert(Request $request){
        $request->validate([
            'class' => 'required',
            'section' => 'required',
            'subject_group' => 'required',
            'subject' => 'required',
            'teacher' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'room_no' => 'required',
        ]);

        ClassTimeTable::create([
            'class' => strtolower($request->input('class')),
            'section' => $request->input('section'),
            'subject_group' => $request->input('subject_group'),
            'subject' => $request->input('subject'),
            'teacher' => $request->input('teacher'),
            'time_from' => $request->input('time_from'),
            'time_to' => $request->input('time_to'),
            'room_no' => $request->input('room_no'),
        ]);

        return redirect()->route('classtimetable');
    }
    public function classTimetableEdit($id){
        $classtimetables = ClassTimeTable::find($id);
        return view('superadmin.academics.create_classtimetables', compact('classtimetables'));
    }
    public function classTimetableUpdate(Request $request, $id){
        $request->validate([
            'class' => 'required',
            'section' => 'required',
            'subject_group' => 'required',
            'subject' => 'required',
            'teacher' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'room_no' => 'required',
        ]);

        $classtimetables = ClassTimeTable::find($id);

        $classtimetables->update([
            'class' => strtolower($request->input('class')),
            'section' => $request->input('section'),
            'subject_group' => $request->input('subject_group'),
            'subject' => $request->input('subject'),
            'teacher' => $request->input('teacher'),
            'time_from' => $request->input('time_from'),
            'time_to' => $request->input('time_to'),
            'room_no' => $request->input('room_no'),
        ]);

        return redirect()->route('classtimetable');
    }

    public function classTimetableDestroy($id){
         $classtimetables = ClassTimeTable::find($id);
         $classtimetables->delete();
         return redirect()->route('classtimetable');
    }

    public function getClasses()
    {
        $classes = Clas::all();
        return response()->json(['classes' => $classes]);
    }

    public function getSubjectGroups(Request $request)
    {
        $subjectGroups = SubjectGroup::where('class', $request->class_id)
                                     ->pluck('name', 'id');

        return response()->json(['subjectGroups' => $subjectGroups]);
    }

    // New method to get subjects based on subject group ID
    public function getSubjects(Request $request)
    {
        $subjects = SubjectGroup::where('name', $request->subject_group)
                            ->pluck('subject', 'id');

        return response()->json(['subjects' => $subjects]);
    }
}

