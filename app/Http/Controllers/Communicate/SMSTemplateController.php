<?php

namespace App\Http\Controllers\Communicate;
use App\Http\Controllers\Controller;
use App\Models\Communicate\SMSTemplate;

use Illuminate\Http\Request;

class SMSTemplateController extends Controller
{
    public function smstemplates(){
        $smstemplates = SMSTemplate::all();
        return view('communicate.view_sms_template',compact('smstemplates'));
    }
    
    public function smstemplateCreate(){
        return view('communicate.create_sms_template');
    }

    public function smstemplateInsert(Request $request){
        $request->validate([
            'title' => 'required',
            'message' => 'required', 
        ]);
        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');
        }
    
        // Create a new Sms Template record
        $smstemplates = SMSTemplate::create([
            'title'        => $request->input('title'),
            'attach_document'=> $filename, 
            'message'    => $request->input('message'), 
        ]);
    
        return redirect()->route('smstemplates');
    }

    public function smstemplateEdit($id){
        $smstemplates = SMSTemplate::find($id);
        return view('communicate.create_sms_template', compact('smstemplates'));
    }

    public function smstemplateUpdate(Request $request,$id){
        $request->validate([
            'title' => 'required',
            'message' => 'required', 
        ]);

        $smstemplates = SMSTemplate::find($id);

        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');

            // Delete the old file if it exists
            if ($smstemplates->attach_document) {
                Storage::disk('public')->delete('attach_documents/' . $smstemplates->attach_document);
            }

            // Update the attach_document field with the new filename
            $smstemplates->attach_document = $filename;
        }
        // dd($request->all());
        $smstemplates->update([
            'title'        => $request->input('title'),
            'message'    => $request->input('message'), 
        ]);
    
        return redirect()->route('smstemplates');
    }

    public function smstemplateDestroy($id){
        $smstemplates = SMSTemplate::find($id);
        $smstemplates->delete();
        return redirect()->back();
    }
}
