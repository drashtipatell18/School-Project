<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admin\StudentAdmission;
use App\Models\Admin\Teacher;
use App\Models\Admin\Clas;
use App\Models\FrontCMS\Event;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $students = StudentAdmission::count();
        $teachers = Teacher::count();
        $classs = Clas::count();
        $events = Event::count();
        return view('dashboard.dashboard',compact('students','teachers','classs','events'));
    }

    public function showForgetPasswordForm()
    {
        return view('roles.forgetpass');
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
            return redirect('login')->with('success', 'Password successfully reset.');
        }
    }
}
