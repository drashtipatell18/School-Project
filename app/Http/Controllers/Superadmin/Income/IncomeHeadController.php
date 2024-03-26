<?php

namespace App\Http\Controllers\Superadmin\Income;

use App\Http\Controllers\Controller;
use App\Models\Admin\Income\HeadIncome;
use App\Models\Admin\Income\IncomeHead;
use Illuminate\Http\Request;

class IncomeHeadController extends Controller
{
    public function incomeHead()
    {
        $income_head = IncomeHead::all();
        return view('superadmin.income.view_income_head',compact('income_head'));
    }
    public function incomeHeadCreate()
    {
        return view('superadmin.income.create_income_head');
    }
    public function incomeHeadInsert(Request $request)
    {
        $request->validate([
            'income_head' => 'required',
        ]);
        IncomeHead::create([
            'income_head' => $request->input('income_head'),
            'description' => $request->input('description'),

        ]);
        // dd($request->all());
        return redirect()->route('income.head');

    }
    public function incomeHeadEdit($id)
    {
        $income_head = IncomeHead::find($id);
        return view('superadmin.income.create_income_head', compact('income_head'));
    }

    public function incomeHeadUpdate(Request $request, $id)
        {
            $request->validate([
                'income_head' => 'required',
            ]);

            // dd($request->all());
            $income_head = IncomeHead::find($id);
            $income_head->update([
                'income_head' => $request->input('income_head'),
                'description' => $request->input('description'),
            ]);
            return redirect()->route('income.head');
        }
        public function incomeHeadDestroy($id)
        {
            $income_head = IncomeHead::find($id);
            $income_head->delete();
            return redirect()->back();
        }

}
