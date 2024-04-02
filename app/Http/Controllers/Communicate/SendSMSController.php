<?php

namespace App\Http\Controllers\Communicate;
use App\Http\Controllers\Controller;
use App\Models\Communicate\SendSMS;
use App\Models\User;
use App\Models\Communicate\SMSTemplate;

use Illuminate\Http\Request;

class SendSMSController extends Controller
{
    public function sendsms(){
        $sendsms  = SendSMS::all();
        return view('communicate.view_sms',compact('sendsms'));
    }
    
    public function sendsmsCreate(){
        $smstemplate   = SMSTemplate::pluck('title', 'title');
        $roles   = User::pluck('role', 'role');
        return view('communicate.create_sms',compact('smstemplate','roles'));
    }

    public function sendsmsInsert(Request $request){
        $request->validate([
            'template' => 'required',
            'title' => 'required',
            'send_through' => 'required', 
            'message' => 'required', 
            'messageto' => 'required', 
        ]);

        $messagetos = $request->input('messageto');
        $messagetostring = implode(',', $messagetos);
    
        $sendsms = SendSMS::create([
            'template'     => $request->input('template'),
            'title'        => $request->input('title'),
            'send_through' => $request->input('send_through'),
            'message'      => $request->input('message'), 
            'group'         => $messagetostring, 
            'individual'   => $request->input('individual'), 
            'individual_name' => $request->input('individual_name'),
            'class'        => $request->input('class'), 
            'section'      => $request->input('section'), 
        ]);
    
        return redirect()->route('sendsms');
    }

    public function sendsmsEdit($id){
        $smstemplate   = SMSTemplate::pluck('title', 'title');
        $sendsms = SendSMS::find($id);
        $roles   = User::pluck('role', 'role');
        return view('communicate.create_sms',compact('smstemplate','roles','sendsms'));
    }

    public function sendsmsUpdate(Request $request,$id){
        $request->validate([
            'template' => 'required',
            'title' => 'required',
            'send_through' => 'required', 
            'message' => 'required', 
            'messageto' => 'required', 
        ]);
        
        $sendsms = SendSMS::find($id);
        $messagetos = $request->input('messageto');
        $messagetostring = implode(',', $messagetos);
    
        $sendsms->update([
            'template'     => $request->input('template'),
            'title'        => $request->input('title'),
            'send_through' => $request->input('send_through'),
            'message'      => $request->input('message'), 
            'group'         => $messagetostring, 
            'individual'   => $request->input('individual'), 
            'individual_name' => $request->input('individual_name'),
            'class'        => $request->input('class'), 
            'section'      => $request->input('section'), 
        ]);
    
        return redirect()->route('sendsms');
    }

    public function sendsmsDestroy($id){
        $sendsms = SendSMS::find($id);
        $sendsms->delete();
        return redirect()->back();
    }
}
