<?php

namespace App\Http\Controllers\Superadmin\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Admin\FrontOffice\PostalReceive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostalReceiveController extends Controller
{
    public function postalReceive()
    {
        $postal_receive = PostalReceive::all();
       
        return view('superadmin.frontoffice.view_postal_receive',compact('postal_receive'));
    }
    public function postalReceiveCreate()
    {
        return view('superadmin.frontoffice.create_postal_receive');
    }
    public function postalReceiveInsert(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'from_title' => 'required',
            'address' => 'required',
            'to_title' => 'required',
            'date' => 'required|date',
        ]);

        $filename = null;

        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');
        }

        PostalReceive::create([
            'from_title' => $request->input('from_title'),
            'reference_no' => $request->input('reference_no'),
            'address' => $request->input('address'),
            'note' => $request->input('note'),
            'to_title' => $request->input('to_title'),
            'date' => $request->input('date'),
            'attach_document' => $filename,
        ]);
        return redirect()->route('postal.receive');
    }
    public function postalReceiveEdit($id)
    {
        $postal_receive = PostalReceive::find($id);
        return view('superadmin.frontoffice.create_postal_receive', compact('postal_receive'));
    }
    public function postalReceiveUpdate(Request $request, $id)
    {
            $request->validate([
                'from_title' => 'required',
                'address' => 'required',
                'to_title' => 'required',
                'date' => 'required|date',
            ]);

            $postal_receive = PostalReceive::find($id);
                // Check if a new file is uploaded
        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');

            // Delete the old file if it exists
            if ($postal_receive->attach_document) {
                Storage::disk('public')->delete('attach_documents/' . $postal_receive->attach_document);
            }

            // Update the attach_document field with the new filename
            $postal_receive->attach_document = $filename;
        }

            $postal_receive->update([
            'from_title' => $request->input('from_title'),
            'reference_no' => $request->input('reference_no'),
            'address' => $request->input('address'),
            'note' => $request->input('note'),
            'to_title' => $request->input('to_title'),
            'date' => $request->input('date'),
            ]);
            return redirect()->route('postal.receive');
    }
    public function postalReceiveDestroy($id)
    {
        $postal_receive = PostalReceive::find($id);
        $postal_receive->delete();
        return redirect()->back();
    }
}
