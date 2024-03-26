<?php

namespace App\Http\Controllers\Superadmin\Income;

use App\Http\Controllers\Controller;
use App\Models\Admin\Income\HeadIncome;
use App\Models\Admin\Income\Income;
use App\Models\Admin\Income\IncomeHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class IncomeController extends Controller
{
  public function income()
  {
      $income = Income::all();
      return view('superadmin.income.view_income',compact('income'));
  }
  public function incomeCreate()
  {
    $income_heads = IncomeHead::pluck('income_head','income_head');
    // dd($income_head);
      return view('superadmin.income.create_income',compact('income_heads'));
  }
  public function incomeInsert(Request $request)
  {
    // dd($request->all());
    $filename = null;
      $request->validate([
          'income_head' => 'required',
          'name' => 'required',
          'date' => 'required|date',
          'amount' => 'required',
      ]);

      if ($request->hasFile('attach_document')) {
        $file = $request->file('attach_document');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('attach_documents', $filename, 'public');
    }
      Income::create([
          'income_head' => $request->input('income_head'),
          'name' => $request->input('name'),
          'invoice_number' => $request->input('invoice_number'),
          'date' => $request->input('date'),
          'amount' => $request->input('amount'),
          'attach_document' => $filename, // Assign the generated filename
          'description' => $request->input('description'),
      ]);
      // dd($request->all());
      return redirect()->route('income');

  }
  public function incomeHeadEdit($id)
  {
      $income = Income::find($id);
      $income_heads = IncomeHead::pluck('income_head', 'income_head');
      return view('superadmin.income.create_income', compact('income','income_heads'));
  }

  public function incomeHeadUpdate(Request $request, $id)
    {
        $request->validate([
            'income_head' => 'required',
            'name' => 'required',
            'date' => 'required|date',
            'amount' => 'required',
        ]);

        // dd($request->all());
        $income = Income::find($id);

        // Check if a new file is uploaded
    if ($request->hasFile('attach_document')) {
        $file = $request->file('attach_document');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('attach_documents', $filename, 'public');

        // Delete the old file if it exists
        if ($income->attach_document) {
            Storage::disk('public')->delete('attach_documents/' . $income->attach_document);
        }

        // Update the attach_document field with the new filename
        $income->attach_document = $filename;
    }

    $income->income_head = $request->input('income_head');
    $income->name = $request->input('name');
    $income->invoice_number = $request->input('invoice_number');
    $income->date = $request->input('date');
    $income->amount = $request->input('amount');
    $income->description = $request->input('description');
    $income->save();

    return redirect()->route('income');
    }
      public function incomeHeadDestroy($id)
      {
          $income = Income::find($id);
          $income->delete();
          return redirect()->back();
      }

}
