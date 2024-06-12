<?php

namespace App\Http\Controllers;

use App\FacultyTypeLang;
use App\Languagetype;
use Illuminate\Http\Request;

class FacultyTypeLangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_type_lang($id){
        $types = FacultyTypeLang::where('faculty_id' , $id)->pluck('type_language_id');
        $edus = Languagetype::whereIn('id' , $types)->get();
        return json_encode($edus);
    }

    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FacultyTypeLang  $facultyTypeLang
     * @return \Illuminate\Http\Response
     */
    public function show(FacultyTypeLang $facultyTypeLang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FacultyTypeLang  $facultyTypeLang
     * @return \Illuminate\Http\Response
     */
    public function edit(FacultyTypeLang $facultyTypeLang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FacultyTypeLang  $facultyTypeLang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacultyTypeLang $facultyTypeLang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FacultyTypeLang  $facultyTypeLang
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacultyTypeLang $facultyTypeLang)
    {
        //
    }
}
