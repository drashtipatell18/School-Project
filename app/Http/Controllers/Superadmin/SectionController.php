<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function section()
    {
        $section = Section::all();
        return view('superadmin.academics.view_section',compact('section'));
    }
    public function sectionCreate()
    {
        return view('superadmin.academics.create_section');
    }
    public function sectionInsert(Request $request)
    {
        $request->validate([
            'section' => 'required',
        ]);
        Section::create([
            'section' => $request->input('section'),
        ]);
        // dd($request->all());
        return redirect()->route('section');

    }
    public function sectionEdit($id)
    {
        $section = Section::find($id);
        return view('superadmin.academics.create_section', compact('section'));
    }

    public function sectionUpdate(Request $request, $id)
        {
            $request->validate([
                'section' => 'required',
            ]);

            // dd($request->all());
            $section = Section::find($id);
            $section->update([
                'section' => $request->input('section'),
            ]);
            return redirect()->route('section');
        }
        public function sectionDestroy($id)
        {
            $section = Section::find($id);
            $section->delete();
            return redirect()->back();
        }
    
}
