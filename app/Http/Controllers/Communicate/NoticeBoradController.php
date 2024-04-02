<?php

namespace App\Http\Controllers\Communicate;
use App\Http\Controllers\Controller;
use App\Models\Communicate\Notification;
use App\Models\User;

use Illuminate\Http\Request;

class NoticeBoradController extends Controller
{
    public function noticeborads(){
        $noticeborads  = Notification::all();
        return view('communicate.view_notice',compact('noticeborads'));
    }
    
    public function noticeboradCreate(){
        $roles = User::pluck('role', 'role');
        return view('communicate.create_notice',compact('roles'));
    }

    public function noticeboradInsert(Request $request){
        $request->validate([
            'title' => 'required',
            'noticedate' => 'required',
            'publishon' => 'required',
            'message' => 'required', 
            'messageto' => 'required', 
        ]);
        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');
        }
    
        // Create a new noticeborads  record
        $noticeborads = Notification::create([
            'title'        => $request->input('title'),
            'noticedate'   => $request->input('noticedate'),
            'publishon'    => $request->input('publishon'),
            'message'        => $request->input('message'),
            'attach_document'=> $filename, 
            'messageto'    => $request->input('messageto'), 
        ]);
    
        return redirect()->route('noticeborads');
    }

    public function noticeboradEdit($id){
        $noticeborads = Notification::find($id);
        $roles         = User::pluck('role', 'role');
        return view('communicate.create_notice', compact('noticeborads','roles')); 
    }

    public function noticeboradUpdate(Request $request,$id){
        $request->validate([
            'title' => 'required',
            'noticedate' => 'required',
            'publishon' => 'required',
            'message' => 'required', 
            'messageto' => 'required', 
        ]);

        $noticeborads = Notification::find($id);

        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');

            // Delete the old file if it exists
            if ($noticeborads->attach_document) {
                Storage::disk('public')->delete('attach_documents/' . $noticeborads->attach_document);
            }

            // Update the attach_document field with the new filename
            $noticeborads->attach_documents = $filename;
        }

        $noticeborads->update([
            'title'        => $request->input('title'),
            'noticedate'   => $request->input('noticedate'),
            'publishon'    => $request->input('publishon'),
            'message'        => $request->input('message'),
            'messageto'    => $request->input('messageto'),  
        ]);
    
        return redirect()->route('noticeborads');
    }

    public function noticeboradDestroy($id){
        $noticeborads = Notification::find($id);
        $noticeborads->delete();
        return redirect()->back();
    }
}
