<?php

namespace App\Http\Controllers\Superadmin\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Admin\Expenses\Expenses;
use App\Models\Admin\FrontOffice\purpose;
use App\Models\Admin\FrontOffice\VisitorBook;
use Illuminate\Http\Request;
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
        $purposes = purpose::pluck('purpose', 'id'); // Assuming 'id' is the primary key
        return view('superadmin.frontoffice.create_visitor_book', compact('purposes'));
    }
    
    public function visitorBookInsert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'purpose' => 'required',
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

        VisitorBook::create([
            'purpose' => $request->input('purpose'),
            'reference_no' => $request->input('reference_no'),
            'address' => $request->input('address'),
            'note' => $request->input('note'),
            'to_title' => $request->input('to_title'),
            'date' => $request->input('date'),
            'attach_document' => $filename,
        ]);
        return redirect()->route('postal.receive');
    }
    public function visitorBookEdit($id)
    {
        $visitor_book = VisitorBook::find($id);
        return view('superadmin.frontoffice.create_visitor_book', compact('visitor_book'));
    }
    public function visitorBookUpdate(Request $request, $id)
    {
            $request->validate([
                'from_title' => 'required',
                'address' => 'required',
                'to_title' => 'required',
                'date' => 'required|date',
            ]);

            $visitor_book = VisitorBook::find($id);
                // Check if a new file is uploaded
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
            'from_title' => $request->input('from_title'),
            'reference_no' => $request->input('reference_no'),
            'address' => $request->input('address'),
            'note' => $request->input('note'),
            'to_title' => $request->input('to_title'),
            'date' => $request->input('date'),
            ]);
            return redirect()->route('postal.receive');
    }
    public function visitorBookDestroy($id)
    {
        $visitor_book = VisitorBook::find($id);
        $visitor_book->delete();
        return redirect()->back();
    }
}
