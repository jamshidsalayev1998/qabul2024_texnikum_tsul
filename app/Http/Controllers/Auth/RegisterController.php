<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\SendSmsResponses;
use App\SmsSend;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendMail;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string',  'max:255', 'unique:users'],
            'password' => [ 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function password_generate($chars)
    {
      $data = '123456789';
      return substr(str_shuffle($data), 0, $chars);
    }
    protected function create(array $data)
    {
        $code = $this->password_generate(6);
        $string = 'TDYU - Your password   '.$code.'  Please save it';
        // return $string;

        $phone = str_replace('-' , '' , $data['email']);
        $phone = str_replace(' ' , '' , $phone);
        $phone = str_replace(')' , '' , $phone);
        $phone = str_replace('(' , '' , $phone);
        $phone_send = str_replace('+' , '' , $phone);
//        return $phone_send;
        $sms_send = new SmsSend();
        $response = $sms_send->send_one_sms($phone_send , $string);
        $curl = \curl_init();
        return User::create([
            'email' => $phone,
            'password' => Hash::make($code),
            'email_code' => $code,
        ]);
    }
}
