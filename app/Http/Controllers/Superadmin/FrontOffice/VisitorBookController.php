<?php

namespace App\Http\Controllers\Superadmin\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clas;
use App\Models\Admin\Expenses\Expenses;
use App\Models\Admin\FrontOffice\purpose;
use App\Models\Admin\FrontOffice\VisitorBook;
use App\Models\Admin\Section;
use App\Models\Admin\StudentAdmission;
use App\Models\Admin\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VisitorBookController extends Controller
{
    public function visitorBook()
    {
        $visitor_book = VisitorBook::all();
        return view('superadmin.frontoffice.view_visitor_book',compact('visitor_book'));
    }
    public function visitorBookCreate()
    {
        $purposes = purpose::pluck('purpose', 'purpose'); 
        $teachers = Teacher::pluck('name', 'name');
        $class = DB::table('class')->get();
        $sections = Section::all();
        return view('superadmin.frontoffice.create_visitor_book', compact('purposes','teachers','class','sections'));
    }
    public function getStudents(Request $request)
    {
        $selectedClass = $request->input('class');
        $selectedSection = $request->input('section'); 

        // Fetch sections associated with the selected class
        $sections = Clas::where('class', $selectedClass)->pluck('section')->toArray();
    
        $studentsQuery = StudentAdmission::where('class', $selectedClass);
    
        if ($selectedSection) {
            $studentsQuery->where('section', $selectedSection);
        }

        $uniqueSections = array_unique($sections);
    
        $students = $studentsQuery->pluck('first_name')->toArray();
    
        return response()->json(['sections' => $uniqueSections, 'students' => $students]);
    }
    public function visitorBookInsert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // 'purpose' => 'required',
            // 'meeting_with' => 'required',
            // 'visitor_name' => 'required',
            // 'class' => 'required',
            // 'section' => 'required',
            // 'student' => 'required',
            // 'staff' => 'required',
        ]);

        $filename = null;

        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');
        }

        VisitorBook::create([
            'purpose' => $request->input('purpose'),
            'meeting_with' => $request->input('meeting_with'),
            'class' => $request->input('class'),
            'section' => $request->input('section'),
            'student' => $request->input('student'),
            'staff' => $request->input('staff'),
            'visitor_name' => $request->input('visitor_name'),
            'phone' => $request->input('phone'),
            'id_card' => $request->input('id_card'),
            'number_of_person' => $request->input('number_of_person'),
            'date' => $request->input('date'),
            'in_time' => $request->input('in_time'),
            'out_time' => $request->input('out_time'),
            'attach_document' => $filename,
            'note' => $request->input('note'),
        ]);
        return redirect()->route('visitor.book');
    }
    public function visitorBookEdit($id)
    {
        $visitor_book = VisitorBook::find($id);
        $purposes = purpose::pluck('purpose', 'purpose'); 
        $teachers = Teacher::pluck('name', 'name');
        $class = DB::table('class')->get();
        $sections = Section::all();
        return view('superadmin.frontoffice.create_visitor_book', compact('visitor_book','purposes','teachers','class','sections'));
    }
    public function visitorBookUpdate(Request $request, $id)
    {
        $visitor_book = VisitorBook::find($id);

    

        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');

            // Delete the old file if it exists
            if ($visitor_book->attach_document) {
                Storage::disk('public')->delete('attach_documents/' . $visitor_book->attach_document);
            }

            // Update the attach_document field with the new filename
            $visitor_book->attach_document = $filename;
        }

        $visitor_book->update([
            'purpose' => $request->input('purpose'),
            'meeting_with' => $request->input('meeting_with'),
            'class' => $request->input('class'),
            'section' => $request->input('section'),
            'student' => $request->input('student'),
            'staff' => $request->input('staff'),
            'visitor_name' => $request->input('visitor_name'),
            'phone' => $request->input('phone'),
            'id_card' => $request->input('id_card'),
            'number_of_person' => $request->input('number_of_person'),
            'date' => $request->input('date'),
            'in_time' => $request->input('in_time'),
            'out_time' => $request->input('out_time'),
            'note' => $request->input('note'),
        ]);
        return redirect()->route('visitor.book');
    }

    public function visitorBookDestroy($id)
    {
        $visitor_book = VisitorBook::find($id);
        $visitor_book->delete();
        return redirect()->back();
    }
}
