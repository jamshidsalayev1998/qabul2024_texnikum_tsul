<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\FacultyTypeEdu;
use App\FacultyTypeLang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_faculties_by_high_school($id){
        $faculties = Faculty::where('high_school_id' , $id)->where('status' , 1)->get();
        return json_encode($faculties);
    }
    public function change_faculty_status($id , $value){
        $faculty = Faculty::find($id);
        $faculty->status = $value;
        if($faculty->update()){
            return redirect(url()->previous())->with('success' , 'Malumot o`zgartirildi');
        }
        else{
            return redirect(url()->previous())->with('error' , 'Xatolik!');
        }
    }
    public function index()
    {
        $faculties = Faculty::with('high_school')->get();
        return view('superadmin.pages.datas.faculty.index' , [
            'faculties' => $faculties,
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all() , [
            'langtype' => ['required'],
            'edutype' => ['required'],
            'name_uz' => ['required'],
            'name_ru' => ['required'],
            'name_en' => ['required'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $faculty = new Faculty();
        $faculty->name_uz = $request->name_uz;
        $faculty->name_en = $request->name_en;
        $faculty->name_ru = $request->name_ru;
        $faculty->high_school_id = $request->high_school_id;
        if ($faculty->save()) {
            foreach ($request->edutype as $k) {

                $f_edu = new FacultyTypeEdu();
                $f_edu->faculty_id = $faculty->id;
                $f_edu->type_education_id = $k;
                $f_edu->save();
            }
            foreach ($request->langtype as $g) {
                $f_edu = new FacultyTypeLang();
                $f_edu->faculty_id = $faculty->id;
                $f_edu->type_language_id = $g;
                $f_edu->save();
            }
        }
        return redirect(url()->previous())->with('success' , 'Malumot qo`shildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        // return $request;
        $validator = Validator::make($request->all() , [
            'langtype' => ['required'],
            'edutype' => ['required'],
            'name_uz' => ['required'],
            'name_ru' => ['required'],
            'name_en' => ['required'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $ff = FacultyTypeLang::where('faculty_id' ,$id)->get();
        foreach ($ff as $k) {
            $k->delete();
        }
        $faculty =  Faculty::find($id);
        $faculty->name_uz = $request->name_uz;
        $faculty->name_en = $request->name_en;
        $faculty->name_ru = $request->name_ru;
        $faculty->high_school_id = $request->high_school_id;

        if ($faculty->update()) {
            if(FacultyTypeEdu::where('faculty_id' , $faculty->id)->exists()){
                $eds = FacultyTypeEdu::where('faculty_id' , $faculty->id)->get();
                foreach($eds as $ii){
                    $ii->delete();
                }
            }
            foreach ($request->edutype as $k) {
                $f_edu = new FacultyTypeEdu();
                $f_edu->faculty_id = $faculty->id;
                $f_edu->type_education_id = $k;
                $f_edu->save();
            }
            if(FacultyTypeLang::where('faculty_id' , $faculty->id)->exists()){
                $lgs = FacultyTypeLang::where('faculty_id' , $faculty->id)->get();
                foreach($lgs as $ii){
                    $ii->delete();
                }
            }
            foreach ($request->langtype as $g) {
                $f_edu = new FacultyTypeLang();
                $f_edu->faculty_id = $faculty->id;
                $f_edu->type_language_id = $g;
                $f_edu->save();
            }
        }
        return redirect(url()->previous())->with('success' , 'Malumot o`zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $faculty = Faculty::find($id);
        $faculty->delete();
        return redirect(url()->previous());
    }
}
