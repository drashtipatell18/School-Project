<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clas;
use App\Models\Admin\Section;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function class()
    {
        $classes = Clas::all();
        $section = Section::pluck('section');
        // dd($section);

        return view('superadmin.academics.view_class',compact('classes','section'));
    }
    public function classCreate()
    {       
        // Fetch all classes
        $classes = Clas::all();

        $sections = Section::pluck('section', 'section');

        // Pass classes data to the view
        return view('superadmin.academics.create_class', compact('classes','sections'));
    }
    public function classInsert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'class' => 'required',
            'section' => 'required',
        ]);
        Clas::create([
            'class' => strtolower($request->input('class')),
            'section' => $request->input('section'),
        ]);
        return redirect()->route('class');

    }
    // public function classEdit($id)
    // {
    //     $classes = Clas::find($id);
    //     $section = Section::pluck('section');
    //     // $currentSection = $class ? $class->section : '';
    //     // dd($currentSection);
    //     return view('superadmin.academics.create_class', compact('classes','sections'));
    // }
    public function classEdit($id)
    {
        $class = Clas::find($id);
        $sections = Section::pluck('section', 'section');
    
        return view('superadmin.academics.create_class', compact('class', 'sections'));
    }
    public function classUpdate(Request $request, $id)
    {
            $request->validate([
                'class' => 'required',
                'section' => 'required',
            ]);

            // dd($request->all());
            $classes = Clas::find($id);
            $classes->update([
                'class' => strtolower($request->input('class')),
                'section' => $request->input('section'),
            ]);
            return redirect()->route('class');
     }
        public function classDestroy($id)
        {
            $classes = Clas::find($id);
            $classes->delete();
            return redirect()->back();
        }
}
