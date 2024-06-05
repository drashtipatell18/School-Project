<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

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

    public function Login(){
        return view('auth.login');
    }

    //  public function loginStore(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    //     if (Auth::attempt($credentials)) {
    //         return redirect()->route('dashboard'); 
    //     } else {
    //         return back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email'));
    //     }
    // }
    public function loginStore(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to authenticate using the user's email
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            return redirect()->route('dashboard');
        }
    
        // Attempt to authenticate using the father's email
        if (Auth::attempt(['father_email' => $credentials['email'], 'password' => $credentials['password']])) {
            return redirect()->route('dashboard');
        }
    
        // Attempt to authenticate using the mother's email
        if (Auth::attempt(['mother_email' => $credentials['email'], 'password' => $credentials['password']])) {
            return redirect()->route('dashboard');
        }
    
        // If none of the attempts succeed, redirect back with an error message
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email'));
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function user()
    {
    //    echo Auth::user()->name;exit;
        $users = User::all();
        return view('users.view_user',compact('users'));
    }

    public function userCreate()
    {
        $roles = Role::pluck('name');
        return view('users.create_user',compact('roles'));
    }
    public function userInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
           
        ]);
        $filename = '';

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
            'image' => $filename
        ]);
        
        return redirect()->route('users')->with('success', 'Roles created successfully.');
    }
    public function userEdit($id)
    {
        $users = User::find($id);
        $roles = Role::pluck('name');
        return view('users.create_user', compact('users','roles'));
    }

    public function userUpdate(Request $request, $id)
    {
        $users = User::find($id);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
    
            // Update user's image information in the database
            $users->image = $filename;
        }

        // Update user name
        $users->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => strtolower($request->input('role')),
        ]);
    
        return redirect()->route('users');
    }

    public function usersDestroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->back();
    }

    public function cPassword(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to change your password.');
        }
    
        // Get the authenticated user
        $user = Auth::user();
    
        // Pass the user information to the view
        return view('roles.changepass', ['user' => $user]);
    }

    public function changePassword(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to change your password.');
        }
    
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|same:confirm_password',
            'confirm_password' => 'required|string|min:8|same:new_password',
        ]);
    
        $user = Auth::user();
    
        if (!\Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
    
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        return redirect()->route('dashboard')->with('success', 'Password changed successfully.');
    }

    
 }
