<?php

namespace App\Http\Controllers\Superadmin\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Admin\FrontOffice\ComplaintType;
use App\Models\Admin\FrontOffice\purpose;
use App\Models\Admin\FrontOffice\Reference;
use App\Models\Admin\FrontOffice\Source;
use Illuminate\Http\Request;

class SetupFrontOfficeController extends Controller
{
    //Purpose
    public function purpose()
    {
        $purpose = purpose::all();
        return view('superadmin.frontoffice.setupfrontoffice.view_purpose',compact('purpose'));
    }
    public function purposeCreate()
    {
        return view('superadmin.frontoffice.setupfrontoffice.create_purpose');
    }
    public function purposeInsert(Request $request)
    {
        $request->validate([
            'purpose' => 'required',
        ]);
        purpose::create([
            'purpose' => $request->input('purpose'),
            'description' => $request->input('description'),

        ]);
        // dd($request->all());
        return redirect()->route('purpose');
    }
    public function purposeEdit($id)
    {
        $purpose = purpose::find($id);
        return view('superadmin.frontoffice.setupfrontoffice.create_purpose', compact('purpose'));
    }

    public function purposeUpdate(Request $request, $id)
    {
            $request->validate([
                'purpose' => 'required',
            ]);

            // dd($request->all());
            $purpose = purpose::find($id);
            $purpose->update([
                'purpose' => $request->input('purpose'),
                'description' => $request->input('description'),
            ]);
            return redirect()->route('purpose');
    }
    public function purposeDestroy($id)
    {
        $purpose = purpose::find($id);
        $purpose->delete();
        return redirect()->back();
    }

    //Complaint
    public function complaintType()
    {
        $complaint_type = ComplaintType::all();
        return view('superadmin.frontoffice.setupfrontoffice.view_complaint_type',compact('complaint_type'));
    }
    public function complaintTypeCreate()
    {
        return view('superadmin.frontoffice.setupfrontoffice.create_complaint_type');
    }
    public function complaintTypeInsert(Request $request)
    {
        $request->validate([
            'complaint_type' => 'required',
        ]);
        ComplaintType::create([
            'complaint_type' => $request->input('complaint_type'),
            'description' => $request->input('description'),

        ]);
        // dd($request->all());
        return redirect()->route('complaint.type');
    }
    public function complaintTypeEdit($id)
    {
        $complaint_type = ComplaintType::find($id);
        return view('superadmin.frontoffice.setupfrontoffice.create_complaint_type', compact('complaint_type'));
    }

    public function complaintTypeUpdate(Request $request, $id)
    {
            $request->validate([
                'complaint_type' => 'required',
            ]);

            // dd($request->all());
            $complaint_type = ComplaintType::find($id);
            $complaint_type->update([
                'complaint_type' => $request->input('complaint_type'),
                'description' => $request->input('description'),
            ]);
            return redirect()->route('complaint.type');
    }
    public function complaintTypeDestroy($id)
    {
        $complaint_type = ComplaintType::find($id);
        $complaint_type->delete();
        return redirect()->back();
    }

    //Source
    public function source()
    {
        $source = Source::all();
        return view('superadmin.frontoffice.setupfrontoffice.view_source',compact('source'));
    }
    public function sourceCreate()
    {
        return view('superadmin.frontoffice.setupfrontoffice.create_source');
    }
    public function sourceInsert(Request $request)
    {
        $request->validate([
            'source' => 'required',
        ]);
        Source::create([
            'source' => $request->input('source'),
            'description' => $request->input('description'),

        ]);
        // dd($request->all());
        return redirect()->route('source');
    }
    public function sourceEdit($id)
    {
        $source = Source::find($id);
        return view('superadmin.frontoffice.setupfrontoffice.create_source', compact('source'));
    }

    public function sourceUpdate(Request $request, $id)
    {
            $request->validate([
                'source' => 'required',
            ]);

            // dd($request->all());
            $source = Source::find($id);
            $source->update([
                'source' => $request->input('source'),
                'description' => $request->input('description'),
            ]);
            return redirect()->route('source');
    }
    public function sourceDestroy($id)
    {
        $source = Source::find($id);
        $source->delete();
        return redirect()->back();
    }

     //Reference
     public function reference()
     {
         $reference = Reference::all();
         return view('superadmin.frontoffice.setupfrontoffice.view_reference',compact('reference'));
     }
     public function referenceCreate()
     {
         return view('superadmin.frontoffice.setupfrontoffice.create_reference');
     }
     public function referenceInsert(Request $request)
     {
         $request->validate([
             'reference' => 'required',
         ]);
         Reference::create([
             'reference' => $request->input('reference'),
             'description' => $request->input('description'),
 
         ]);
         // dd($request->all());
         return redirect()->route('reference');
     }
     public function referenceEdit($id)
     {
         $reference = Reference::find($id);
         return view('superadmin.frontoffice.setupfrontoffice.create_reference', compact('reference'));
     }
 
     public function referenceUpdate(Request $request, $id)
     {
             $request->validate([
                 'reference' => 'required',
             ]);
 
             // dd($request->all());
             $reference = Reference::find($id);
             $reference->update([
                 'reference' => $request->input('reference'),
                 'description' => $request->input('description'),
             ]);
             return redirect()->route('reference');
     }
     public function referenceDestroy($id)
     {
         $reference = Reference::find($id);
         $reference->delete();
         return redirect()->back();
     }
 
}
  