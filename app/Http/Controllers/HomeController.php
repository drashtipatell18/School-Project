<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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

    public function showForgetPasswordForm()
    {
        return view('auth.forgetpass');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email','=',$request->email)->first();
        if(!empty($user)){
            $user->remember_token =  Str::random(40);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return back()->with('success', 'Password reset link sent successfully.');

        }
    }

    public function reset($token){
        $user = User::where('remember_token','=',$token)->first();
        if(!empty($user)){
            $data['user'] = $user;
            $data['token'] = $user->remember_token;
            // echo '<pre>';
            // print_r($data['user']);
            // echo '</pre>';exit;
            return view('auth.reset', $data);
        }
    }

    public function postReset($token, Request $request){
        $request->validate([
            'newpassword' => 'required|string|min:8',
            'confirmpassword' => 'required|string|min:8',
        ]);
        
        if ($request->newpassword !== $request->confirmpassword) {
            return redirect()->back()->with('error', 'The new password confirmation does not match.');
        }
    
        $user = User::where('remember_token','=',$token)->first();
        if(!empty($user)){
            if(empty($user->email_verified_at)){
                $user->email_verified_at = now();
            }
            $user->remember_token =  Str::random(40);
            $user->password = Hash::make($request->newpassword); 
            $user->save();
            return redirect('/')->with('success', 'Password successfully reset.');
        }
    }
    
    
}
