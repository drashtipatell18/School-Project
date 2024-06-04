<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function role()
    {
        // dd('isha');
        $roles = Role::all();
        return view('roles.view_role',compact('roles'));
    }
    public function createRole()
    {
        return view('roles.create_role');
    }
      
    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        Role::create([
            'name' => $request->input('name'),
        ]);
        
        return redirect()->route('roles');
    }
    
    
    public function RoleEdit($id)
    {
        $roles = Role::find($id);
        return view('roles.create_role', compact('roles'));
    }

    public function RoleUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        $roles = Role::find($id);
    
       
        // Update category name
        $roles->update([
            'name' => $request->input('name'
            
        )]);
    
        return redirect()->route('role');
    }
    
    public function RoleDestroy($id)
    {
            $roles = Role::find($id);
            $roles->delete();
            return redirect()->route('role');
    }
    
}
