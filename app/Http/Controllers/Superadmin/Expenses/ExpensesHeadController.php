<?php

namespace App\Http\Controllers\Superadmin\Expenses;

use App\Http\Controllers\Controller;
use App\Models\Admin\Expenses\ExpensesHead;
use Illuminate\Http\Request;

class ExpensesHeadController extends Controller
{
    public function expensesHead()
    {
        $expenses_head = ExpensesHead::all();
        return view('superadmin.expenses.view_expenses_head',compact('expenses_head'));
    }
    public function expensesHeadCreate()
    {
        return view('superadmin.expenses.create_expenses_head');
    }
    public function expensesHeadInsert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'expenses_head' => 'required',
        ]);
        ExpensesHead::create([
            'expenses_head' => $request->input('expenses_head'),
            'description' => $request->input('description'),

        ]);
        // dd($request->all());
        return redirect()->route('expenses.head');
    }
    public function expensesHeadEdit($id)
    {
        $expenses_head = ExpensesHead::find($id);
        return view('superadmin.expenses.create_expenses_head', compact('expenses_head'));
    }

    public function expensesHeadUpdate(Request $request, $id)
        {
            $request->validate([
                'expenses_head' => 'required',
            ]);

            // dd($request->all());
            $expenses_head = ExpensesHead::find($id);
            $expenses_head->update([
                'expenses_head' => $request->input('expenses_head'),
                'description' => $request->input('description'),
            ]);
            return redirect()->route('expenses.head');
        }
        public function expensesHeadDestroy($id)
        {
            $expenses_head = ExpensesHead::find($id);
            $expenses_head->delete();
            return redirect()->back();
        }
}
