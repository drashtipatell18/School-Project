<?php

namespace App\Http\Controllers\Superadmin\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Admin\FrontOffice\PostalDispatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostalDispatchController extends Controller
{
    public function postalDispatch()
    {
        $postal_dispatch = PostalDispatch::all();
       
        return view('superadmin.frontoffice.view_postal_dispatch',compact('postal_dispatch'));
    }
    public function postalDispatchCreate()
    {
        return view('superadmin.frontoffice.create_postal_dispatch');
    }
    public function postalDispatchInsert(Request $request)
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

        PostalDispatch::create([
            'from_title' => $request->input('from_title'),
            'reference_no' => $request->input('reference_no'),
            'address' => $request->input('address'),
            'note' => $request->input('note'),
            'to_title' => $request->input('to_title'),
            'date' => $request->input('date'),
            'attach_document' => $filename,
        ]);
        return redirect()->route('postal.dispatch');
    }
    public function postalDispatchEdit($id)
    {
        $postal_dispatch = PostalDispatch::find($id);
        return view('superadmin.frontoffice.create_postal_dispatch', compact('postal_dispatch'));
    }
    public function postalDispatchUpdate(Request $request, $id)
    {
            $request->validate([
                'from_title' => 'required',
                'address' => 'required',
                'to_title' => 'required',
                'date' => 'required|date',
            ]);

            $postal_dispatch = PostalDispatch::find($id);
                // Check if a new file is uploaded
        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');

            // Delete the old file if it exists
            if ($postal_dispatch->attach_document) {
                Storage::disk('public')->delete('attach_documents/' . $postal_dispatch->attach_document);
            }

            // Update the attach_document field with the new filename
            $postal_dispatch->attach_document = $filename;
        }

            $postal_dispatch->update([
            'from_title' => $request->input('from_title'),
            'reference_no' => $request->input('reference_no'),
            'address' => $request->input('address'),
            'note' => $request->input('note'),
            'to_title' => $request->input('to_title'),
            'date' => $request->input('date'),
            ]);
            return redirect()->route('postal.dispatch');
    }
    public function postalDispatchDestroy($id)
    {
        $postal_dispatch = PostalDispatch::find($id);
        $postal_dispatch->delete();
        return redirect()->back();
    }
}
