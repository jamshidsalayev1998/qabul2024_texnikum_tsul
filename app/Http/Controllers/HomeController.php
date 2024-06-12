<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Auth;
use App\User;

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

    public function check_phone_code(Request $request){
        $user = User::find(Auth::user()->id);
        if ($request->code == $user->email_code) {
           $user->email_status = 1;
           $user->password = Hash::make($request->code);
            $user->update();
            return redirect(route('check_role'));
        }
        else{
            return redirect(route('email.activate'))->with('error_code' , 'Parol noto`g`ri');
        }


    }
    public function no_permission(){
        return "Huquq olib tashlangan";
    }

    public function check_status(){
        if (Auth::user()->email_status == 1) {
            return redirect(route('check_role'));
        }
        else{
            return redirect(route('email.activate'));
        }
    }

    public function check_role(){
            if (Auth::user()->role == 0) {
                return redirect(route('petition.index'));
            }
            if (Auth::user()->role == 1) {
                return redirect(route('admin.index'));
            }
            if (Auth::user()->role == 2) {
                return redirect(route('admin.index'));
            }
            if (Auth::user()->role == 3) {
                return redirect(route('admin.index'));
            }
            if (Auth::user()->role == 4) {
                return redirect(route('admin.index'));
            }
    }
    public function index()
    {
        if (Auth::user()->email_status == 1) {
            if (Auth::user()->role == 0) {
                return redirect(route('petition.index'));
            }
            if (Auth::user()->role == 1) {
                return redirect(route('admin.index'));
            }
            if (Auth::user()->role == 2) {
                return redirect(route('admin.index'));
            }
            if (Auth::user()->role == 3) {
                return redirect(route('admin.index'));
            }
             if (Auth::user()->role == 4) {
                return redirect(route('admin.index'));
            }
        }
        else{
            // return redirect(route('email.activate'));
            return view('user.pages.phone.check_code');
        }


    }

    public function index_reg()
    {
        if (Auth::user()->email_status == 1) {
            if (Auth::user()->role == 0) {
                return redirect(route('petition.index'));
            }
            if (Auth::user()->role == 1) {
                return redirect(route('admin.index'));
            }
            if (Auth::user()->role == 2) {
                return redirect(route('admin.index'));
            }
            if (Auth::user()->role == 3) {
                return redirect(route('admins.index'));
            }
        }
        else{
            // return redirect(route('email.activate'));
            return view('user.pages.phone.check_code');
        }


    }

    public function check_code($code){
        // if (!Auth::check() && User::where('email_code' , $code )->first()->role == 2) {
        //     $user = User::where('email_code' , $code )->first();
        //     $user->email_status = 1;
        //     $user->update();
        //     return redirect(route('login'));
        // }
        // else{
        //     return redirect(route('login'));
        // }
        if (Auth::user()->email_code == $code) {
            $self = Auth::user();
            $self->email_status = 1;
            $self->update();
            return redirect(route('check_role'));
        }
        else{
            return redirect(route('email.activate'));
        }
        // $user = User::where('email_code' , $code)->first()
    }

    public function resend_email(){
        $user = Auth::user();
        $code = $user->email_code;
        $details = [
            'code' =>$code,
            'body' => 'sjkdhfuhdsflk'
        ];
        $email = $user->email;
        \Mail::to($email)->send(new SendMail($details));
        return redirect(url()->previous())->with('success' , 'Link sent again');
    }

    public function activate(){
        return view('user.pages.phone.check_code');
    }
}
