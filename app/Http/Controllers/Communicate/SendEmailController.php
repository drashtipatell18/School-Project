<?php

namespace App\Http\Controllers\Communicate;
use App\Http\Controllers\Controller;
use App\Models\Communicate\SendEmail;
use App\Models\Communicate\EmailTemplate;
use App\Models\User;

use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    public function sendemails(){
        $sendemails  = SendEmail::all();
        return view('communicate.view_email',compact('sendemails'));
    }
    
    public function sendemailCreate(){
        $emailtemplate = EmailTemplate::pluck('title', 'title');
        $roles         = User::pluck('role', 'role');
        return view('communicate.create_email',compact('emailtemplate','roles'));
    }

    public function sendemailInsert(Request $request){
        // dd($request->all());
        $request->validate([
            'template' => 'required',
            'title' => 'required',
            'message' => 'required', 
            'messageto' => 'required', 
        ]);
        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');
        }
        $messagetos = $request->input('messageto');
        $messagetostring = implode(',', $messagetos);

        $sendemails = SendEmail::create([
            'template'     => $request->input('template'),
            'title'        => $request->input('title'),
            'attach_document'=> $filename, 
            'message'      => $request->input('message'), 
            'group'         => $messagetostring, 
            'individual'   => $request->input('individual'), 
            'individual_name' => $request->input('individual_name'),
            'class'        => $request->input('class'), 
            'section'      => $request->input('section'), 
        ]);
    
        return redirect()->route('sendemails');
    }

    public function sendemailEdit($id){
        $emailtemplate   = EmailTemplate::pluck('title', 'title');
        $sendemails       = SendEmail::find($id);
        $roles           = User::pluck('role', 'role');
        return view('communicate.create_email',compact('emailtemplate','roles','sendemails'));
    }

    public function sendemailUpdate(Request $request,$id){
        $request->validate([
            'template' => 'required',
            'title' => 'required',
            'message' => 'required', 
            'messageto' => 'required', 
        ]);
        
        $sendemails = SendEmail::find($id);
        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');

            // Delete the old file if it exists
            if ($sendemails->attach_document) {
                Storage::disk('public')->delete('attach_documents/' . $sendemails->attach_document);
            }

            // Update the attach_document field with the new filename
            $sendemails->attach_documents = $filename;
        }
        $messagetos = $request->input('messageto');
        $messagetostring = implode(',', $messagetos);
    
        $sendemails->update([
            'template'     => $request->input('template'),
            'title'        => $request->input('title'),
            'message'      => $request->input('message'), 
            'group'         => $messagetostring, 
            'individual'   => $request->input('individual'), 
            'individual_name' => $request->input('individual_name'),
            'class'        => $request->input('class'), 
            'section'      => $request->input('section'), 
        ]);
    
        return redirect()->route('sendemails');
    }

    public function sendemailDestroy($id){
        $sendemails = SendEmail::find($id);
        $sendemails->delete();
        return redirect()->back();
    }
}
