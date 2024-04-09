<?php

namespace App\Http\Controllers\Communicate;
use App\Http\Controllers\Controller;
use App\Models\Communicate\EmailTemplate;

use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    public function emailtemplates(){
        $emailtemplates  = EmailTemplate::all();
        return view('communicate.view_email_template',compact('emailtemplates'));
    }
    
    public function emailtemplateCreate(){
        return view('communicate.create_email_template');
    }

    public function emailtemplateInsert(Request $request){
        $request->validate([
            'title' => 'required',
            'message' => 'required', 
        ]);
        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');
        }
    
        // Create a new EmailTemplate  record
        $emailtemplates = EmailTemplate::create([
            'title'        => $request->input('title'),
            'attach_document'=> $filename, 
            'message'    => $request->input('message'), 
        ]);
    
        return redirect()->route('emailtemplates');
    }

    public function emailtemplateEdit($id){
        $emailtemplates = EmailTemplate::find($id);
        return view('communicate.create_email_template', compact('emailtemplates'));
    }

    public function emailtemplateUpdate(Request $request,$id){
        $request->validate([
            'title' => 'required',
            'message' => 'required', 
        ]);

        $emailtemplates = EmailTemplate::find($id);

        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');

            // Delete the old file if it exists
            if ($emailtemplates->attach_document) {
                Storage::disk('public')->delete('attach_documents/' . $emailtemplates->attach_document);
            }

            // Update the attach_document field with the new filename
            $emailtemplates->attach_documents = $filename;
        }

        $emailtemplates->update([
            'title'        => $request->input('title'),
            'message'    => $request->input('message'), 
        ]);
    
        return redirect()->route('emailtemplates');
    }

    public function emailtemplateDestroy($id){
        $emailtemplates = EmailTemplate::find($id);
        $emailtemplates->delete();
        return redirect()->back();
    }
}
