<?php

namespace App\Http\Controllers\Superadmin\Expenses;

use App\Http\Controllers\Controller;
use App\Models\Admin\Expenses\Expenses;
use App\Models\Admin\Expenses\ExpensesHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExpensesController extends Controller
{
    public function expenses()
    {
        $expenses = Expenses::all();
        // foreach ($expenses as $exp) {
        //     $expenses_head_ids = explode(',', $exp->expenses_head);
        //     $expenses_head_names = ExpensesHead::whereIn('id', $expenses_head_ids)->pluck('expenses_head');
        //     $exp->expenses_head_name = $expenses_head_names;
        // }
        return view('superadmin.expenses.view_expenses',compact('expenses'));
    }
    public function expensesCreate()
    {
        $expenses_heads = ExpensesHead::pluck('expenses_head', 'expenses_head');
    //   dd($expenses_heads);
        return view('superadmin.expenses.create_expenses',compact('expenses_heads'));
    }
    public function expensesInsert(Request $request)
    {
        $filename = null; // Initialize $filename variable
    
        $request->validate([
            'expenses_head' => 'required',
            'name' => 'required',
            'date' => 'required|date',
            'amount' => 'required',
        ]);
    
        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');
        }
    
        Expenses::create([
            'expenses_head' => $request->input('expenses_head'),
            'name' => $request->input('name'),
            'invoice_number' => $request->input('invoice_number'),
            'date' => $request->input('date'),
            'amount' => $request->input('amount'),
            'attach_document' => $filename, // Assign the generated filename
            'description' => $request->input('description'),
        ]);
    
        return redirect()->route('expenses');
    }
    public function expensesEdit($id)
    {
        $expenses = Expenses::find($id);
        $expenses_heads = ExpensesHead::pluck('expenses_head', 'expenses_head');
        return view('superadmin.expenses.create_expenses', compact('expenses', 'expenses_heads'));
    }
      
    public function expensesUpdate(Request $request, $id)
    {
        $request->validate([
            'expenses_head' => 'required',
            'name' => 'required',
            'date' => 'required|date',
            'amount' => 'required',
        ]);

        $expenses = Expenses::find($id);

        // Check if a new file is uploaded
        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('attach_documents', $filename, 'public');

            // Delete the old file if it exists
            if ($expenses->attach_document) {
                Storage::disk('public')->delete('attach_documents/' . $expenses->attach_document);
            }

            // Update the attach_document field with the new filename
            $expenses->attach_document = $filename;
        }

        // Update other fields
        $expenses->expenses_head = $request->input('expenses_head');
        $expenses->name = $request->input('name');
        $expenses->invoice_number = $request->input('invoice_number');
        $expenses->date = $request->input('date');
        $expenses->amount = $request->input('amount');
        $expenses->description = $request->input('description');
        $expenses->save();

        return redirect()->route('expenses');
    }
    public function expensesDestroy($id)
    {
        $expenses = Expenses::find($id);
        $expenses->delete();
        return redirect()->back();
    }
}
