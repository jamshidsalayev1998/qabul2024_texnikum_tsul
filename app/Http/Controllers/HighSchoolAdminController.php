<?php

namespace App\Http\Controllers;

use App\HighSchool;
use App\HighSchoolAdmin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HighSchoolAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = HighSchoolAdmin::all();
        $high_schools = HighSchool::all();
        return view('superadmin.pages.high_school_admin.index', [
            'data' => $admins,
            'high_schools' => $high_schools
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'middle_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $name = $request->last_name . ' ' . $request->first_name . ' ' . $request->middle_name;
        $user = new User();
        $user->name = $name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 4;
        $user->email_status = 1;
        $user->save();
        $high_school_admin = new HighSchoolAdmin();
        $high_school_admin->name = $name;
        $high_school_admin->high_school_id = $request->high_school_id;
        $high_school_admin->user_id = $user->id;
        $high_school_admin->save();
        return redirect()->back()->with('success', 'Tashkilot admini qo`shildi');
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Edutype $edutype
     * @return \Illuminate\Http\Response
     */
    public function show(HighSchool $edutype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Edutype $edutype
     * @return \Illuminate\Http\Response
     */
    public function edit(HighSchool $edutype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Edutype $edutype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Edutype $edutype
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $high_school_admin = HighSchoolAdmin::find($id);
        $user = $high_school_admin->user;
        $high_school_admin->delete();
        $user->delete();
        return redirect()->back()->with('success' , 'Malumot o`chirildi');
    }
    public function new_password(Request $request , $id){
        $admin = HighSchoolAdmin::find($id);
        $user = $admin->user;
        $user->password = Hash::make($request->password);
        $user->update();
        return redirect()->back()->with('success' , 'Malumot o`zgartirildi');
    }
}
