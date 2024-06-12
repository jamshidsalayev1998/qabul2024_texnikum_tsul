<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;

class MailSendController extends Controller
{
    public function sendmail($code){
    	$details = [
    		'code' =>$code,
    		'body' => 'sjkdhfuhdsflk'
    	];
    	\Mail::to('akkanuntdlyaali3@gmail.com')->send(new SendMail($details));
    	return redirect()->back();
    }

}
