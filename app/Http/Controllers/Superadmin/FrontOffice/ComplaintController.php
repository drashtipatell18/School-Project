<?php

namespace App\Http\Controllers\Superadmin\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Admin\FrontOffice\Complaint;
use App\Models\Admin\FrontOffice\ComplaintType;
use App\Models\Admin\FrontOffice\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    public function complaint()
    {
        $complaint = Complaint::all();
       
        return view('superadmin.frontoffice.setupfrontoffice.view_complaint',compact('complaint'));
    }
    public function complaintCreate()
    {
        $complaint_type = ComplaintType::pluck('complaint_type','complaint_type');
        // dd($complaint_type);
        $sources = Source::pluck('source','source');
        return view('superadmin.frontoffice.setupfrontoffice.create_complaint',compact('complaint_type','sources'));
    }
    public function complaintInsert(Request $request)
    {
        $request->validate([
            'complaint_type' => 'required',
            'source' => 'required',
            'complain_by' => 'required',
            'phone' => 'required',
            'date' => 'required|date',
        ]);

        $filename = null;

        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');
        }

        Complaint::create([
            'complaint_type' => $request->input('complaint_type'),
            'source' => $request->input('source'),
            'complain_by' => $request->input('complain_by'),
            'phone' => $request->input('phone'),
            'date' => $request->input('date'),
            'description' => $request->input('description'),
            'action_taken' => $request->input('action_taken'),
            'assigned' => $request->input('assigned'),
            'note' => $request->input('note'),
            'attach_document' => $filename,
        ]);
        return redirect()->route('complaint');
    }
    public function complaintEdit($id)
    {
        $complaint = Complaint::find($id);
        $complaint_type = ComplaintType::pluck('complaint_type','complaint_type');
        $sources = Source::pluck('source','source');
        return view('superadmin.frontoffice.setupfrontoffice.create_complaint', compact('complaint','complaint_type','sources'));
    }
    public function complaintUpdate(Request $request, $id)
    {
            $request->validate([
            'complaint_type' => 'required',
            'source' => 'required',
            'complain_by' => 'required',
            'phone' => 'required',
            'date' => 'required|date',
            ]);

            // dd($request->all());
            $complaint = Complaint::find($id);
                // Check if a new file is uploaded
        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');

            // Delete the old file if it exists
            if ($complaint->attach_document) {
                Storage::disk('public')->delete('attach_documents/' . $complaint->attach_document);
            }

            // Update the attach_document field with the new filename
            $complaint->attach_document = $filename;
        }

            $complaint->update([
                'complaint_type' => $request->input('complaint_type'),
                'source' => $request->input('source'),
                'complain_by' => $request->input('complain_by'),
                'phone' => $request->input('phone'),
                'date' => $request->input('date'),
                'description' => $request->input('description'),
                'action_taken' => $request->input('action_taken'),
                'assigned' => $request->input('assigned'),
                'note' => $request->input('note'),
            ]);
            return redirect()->route('complaint');
    }
    public function complaintDestroy($id)
    {
        $complaint = Complaint::find($id);
        $complaint->delete();
        return redirect()->back();
    }
}
