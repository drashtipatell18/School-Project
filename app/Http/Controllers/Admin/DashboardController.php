<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('dashboard.dashboard');
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

    
}
