<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clas;
use App\Models\Admin\Section;
use App\Models\Student\Homework;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeworkController extends Controller
{
    public function studentHomework()
    {
        $homework = Homework::all();
        $class = Clas::all();
        $sections = Section::all();
        // dd($homework);
        return view('homework.view_homework',compact('homework','class','sections'));
    }
     public function homeworkCreate()
    {
        $class = DB::table('class')->get();
        $sections = Section::all();
        // dd($sections);
        return view('homework.create_homework',compact('class','sections'));
    }
    public function getClasses()
    {
        $classes = Clas::pluck('class')->unique();
        return response()->json(['classes' => $classes]);
    }
    
    public function getSections(Request $request)
    {
        $selectedClass = $request->input('class');
        $sections = Clas::where('class', $selectedClass)->pluck('section')->unique();
        // dd($sections);
        return response()->json(['sections' => $sections]);
    }    
    public function homeworkInsert(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'section' => 'required',
            'subject' => 'required',
            'homework_date' => 'required',
            'submission_date' => 'required',
            'note' => 'required',
            'status' => 'required|in:pending,submitted,late_submission',
        ]);
        Homework::create([
            'class' => $request->input('class'),
            'section' => $request->input('section'),
            'subject' => $request->input('subject'),
            'homework_date' => $request->input('homework_date'),
            'submission_date' => $request->input('submission_date'),
            'note' => $request->input('note'),
            'status' => $request->input('status'),
        ]);
        // dd($request->all());
        return redirect()->route('homework');

    }
    public function homeworkEdit($id)
    {
        $class = DB::table('class')->get();
        $sections = DB::table('class')->pluck('section')->toArray();
        $homework = Homework::find($id);
        return view('homework.create_homework', compact('homework','class','sections'));
    }

    public function homeworkUpdate(Request $request, $id)
        {
            $request->validate([
                'class' => 'required',
                'section' => 'required',
                'subject' => 'required',
                'homework_date' => 'required',
                'submission_date' => 'required',
                'note' => 'required',
                'status' => 'required',
            ]);

            $homework = Homework::find($id);
            $homework->update([
                'class' => $request->input('class'),
                'section' => $request->input('section'),
                'subject' => $request->input('subject'),
                'homework_date' => $request->input('homework_date'),
                'submission_date' => $request->input('submission_date'),
                'note' => $request->input('note'),
                'status' => $request->input('status'),
            ]);
            return redirect()->route('homework');
        }
        public function homeworkDestroy($id)
        {
            $homework = Homework::find($id);
            $homework->delete();
            return redirect()->route('classtimetable');
        }
    
}
