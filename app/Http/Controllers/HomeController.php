<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function role()
    {
    //    echo Auth::user()->name;exit;
        $roles = User::all();
        return view('roles.view_role',compact('roles'));
    }

    public function roleCreate()
    {
        return view('roles.create_role');
    }
    public function roleInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
           
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }
        
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => strtolower($request->input('role')),
            'image' => $filename,
        ]);
        
        return redirect()->route('roles')->with('success', 'Roles created successfully.');
    }
    public function roleEdit($id)
    {
        $roles = User::find($id);
        return view('roles.create_role', compact('roles'));
    }

    public function roleUpdate(Request $request, $id)
    {
        $roles = User::find($id);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
    
            // Update user's image information in the database
            $roles->image = $filename;
        }

        // Update user name
        $roles->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => strtolower($request->input('role')),
        ]);
    
        return redirect()->route('roles');
    }

    public function roleDestroy($id)
    {
        $category = User::find($id);
        $category->delete();
        return redirect()->back();
    }


}
