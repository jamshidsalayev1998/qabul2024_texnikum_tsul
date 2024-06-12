<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SendSmsResponses;
use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\SmsSend;



class ForgotController extends Controller
{
    public function __construct(){
    	$this->middleware('guest');
    }

    public function password_generate($chars)
    {
      $data = '123456789';
      return substr(str_shuffle($data), 0, $chars);
    }

    public function reset_form(){
    	return view('auth.forgot');
    }

    public function reset(Request $request){
    	if (!Auth::check()) {
    		if (User::where('email' , $request->email)->exists()) {
    			$code = $this->password_generate(6);
    			$string = 'TDYU - Your password   '.$code.'  Please save it';
		        $phone = str_replace('-' , '' , $request->email);
		        $phone = str_replace(' ' , '' , $phone);
		        $phone = str_replace(')' , '' , $phone);
		        $phone = str_replace('(' , '' , $phone);
		        $phone_send = str_replace('+' , '' , $phone);
		        $sms_send = new SmsSend();
                $response = $sms_send->send_one_sms($phone_send , $string);
		        $user = User::where('email' , $request->email)->first();
		        $user->password = Hash::make($code);
		        $user->email_code = $code;
		        $user->email_status = 1;
		        $user->update();
		        return redirect(route('login'));
		    }
		    return redirect(route('register'))->with('error' , 'Iltimos ro\'yhatdan o\'ting');
		}
    }
}
