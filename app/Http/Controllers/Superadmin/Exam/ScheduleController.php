<?php

namespace App\Http\Controllers\Superadmin\Exam;

use App\Http\Controllers\Controller;
use App\Models\Admin\Exam\Exam;
use App\Models\Admin\Exam\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function schedule()
    {
        $schedules = Schedule::all();
        $exams = Exam::all();
        // dd($exams);
        return view('superadmin.exam.view_exam_schedule',compact('schedules','exams'));
    }
    // Controller Adjustments
    public function getGroups()
    {
        $examGroups = Exam::pluck('exam_group');
        return response()->json(['examGroups' => $examGroups]);
    }

    public function getExam(Request $request)
    {
        $selectedExamGroups = $request->input('exam_group');
        // dd($selectedExamGroups);
        $exams = Exam::where('exam_group', $selectedExamGroups)->pluck('exam');
        // dd($exams);
        return response()->json(['exams' => $exams]);
    }

    public function scheduleCreate()
    {
        $examGroups = DB::table('exams')->get();
        // dd($exams);
        return view('superadmin.exam.exam_schedule',compact('examGroups'));
    }
    public function scheduleInsert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'exam_group' => 'required',
            'exam' => 'required',
            'subject' => 'required',
            'date_from' => 'required',
            // 'start_time' => 'required',
            'duration' => 'required|numeric',
            'room_no' => 'required',
            'max_marks' => 'required|numeric',
            'min_marks' => 'required|numeric',
        ]);
        Schedule::create([
            'exam_group' => $request->input('exam_group'),
            'exam' => $request->input('exam'),
            'subject' => $request->input('subject'),
            'date_from' => $request->input('date_from'),
            'start_time' => $request->input('start_time'),
            'duration' => $request->input('duration'),
            'room_no' => $request->input('room_no'),
            'max_marks' => $request->input('max_marks'),
            'min_marks' => $request->input('min_marks'),
        ]);

        return redirect()->route('schedule');
    }
    public function scheduleEdit($id)
    {
        $schedule = Schedule::find($id);
        return view('superadmin.exam.exam_schedule', compact('schedule'));
    }
    public function scheduleUpdate(Request $request, $id)
    {
        $request->validate([
            'exam_group' => 'required',
            'exam' => 'required',
            'subject' => 'required',
            'date_from' => 'required',
            // 'start_time' => 'required',
            'duration' => 'required|numeric',
            'room_no' => 'required',
            'max_marks' => 'required|numeric',
            'min_marks' => 'required|numeric',
        ]);

        $schedule = Schedule::find($id);
        $schedule->update([
            'exam_group' => $request->input('exam_group'),
            'exam' => $request->input('exam'),
            'subject' => $request->input('subject'),
            'date_from' => $request->input('date_from'),
            'start_time' => $request->input('start_time'),
            'duration' => $request->input('duration'),
            'room_no' => $request->input('room_no'),
            'max_marks' => $request->input('max_marks'),
            'min_marks' => $request->input('min_marks'),
        ]);
        return redirect()->route('schedule');
    }
    public function scheduleDestroy($id)
        {
            $schedule = Schedule::find($id);
            $schedule->delete();
            return redirect()->back();
        }    
}
