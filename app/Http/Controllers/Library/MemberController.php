<?php

namespace App\Http\Controllers\Library;
use App\Http\Controllers\Controller;
use App\Models\Admin\StudentAdmission;

use App\Models\Library\Member;
use App\Models\Library\BookIssue;
use App\Models\Library\Book;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function members()
    {
        $members = Member::all();
        return view('library.view_member',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function memberCreate()
    {
        $admissionno = StudentAdmission::pluck('admissionno');
        return view('library.create_member',compact('admissionno'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function memberInsert (Request $request)
    {
        $request->validate([
            'userid' => 'required',
            'addmissionno' => 'required',
            'role' => 'required',
            'name' => 'required', 
            'phone' => 'required',
        ]);
        $members = Member::create([
            'userid'        => $request->input('role'),
            'addmissionno'  => $request->input('addmissionno'),
            'role'          => $request->input('userid'),
            'name'          => $request->input('name'), 
            'phone'         => $request->input('phone'), 
        ]);

        return redirect()->route('members');
    }

    /**
     * Display the specified resource.
     */

     public function IssueMemberBook(Request $request)
     {
         $request->validate([
             'book' => 'required',
             'duereturndate' => 'required',
         ]);
     
         $bookId = $request->input('book');
         $user = User::find($request->input('id'));
     
         // Create book issue record
         $bookissues = BookIssue::create([
             'book' => $bookId,
             'duereturndate' => $request->input('duereturndate'),
         ]);
     
         $bookissues = BookIssue::find($bookId); 
         $availableQty = Book::where('title', $bookId)->pluck('available')->first();
        if ($availableQty !== null) {
            $availableQty -= 1;
            // Update the available quantity in the database
            Book::where('title', $bookId)->update(['available' => $availableQty]);
        }


         return redirect()->route('view.member', ['id' => $user->id,'bookissues'=> $bookissues]);
     }
     
    public function saveDate(Request $request){
        // dd($request->all());
        $selectedDate = $request->input('returndate');
        $bookissueid = $request->input('bookissueid');
        $memberid = $request->input('memberid');
        $bookissues = BookIssue::find($bookissueid); 

        $bookissues->returndate = $selectedDate;
      
        $bookissues->save();
    
        return redirect()->route('view.member', ['id' => $memberid]);
    }
    
    public function memberView($id)
    {
        $members = Member::find($id);
        $books = Book::pluck('title','id');
        $admissionno = StudentAdmission::pluck('admissionno');
        $bookissues = BookIssue::all();
        return view('library.view_member_list', compact('members','admissionno','books','bookissues'));
    }
    
}
