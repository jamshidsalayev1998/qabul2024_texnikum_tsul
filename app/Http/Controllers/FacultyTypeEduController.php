<?php

namespace App\Http\Controllers;

use App\FacultyTypeEdu;
use App\Edutype;
use Illuminate\Http\Request;

class FacultyTypeEduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get_type_edu($id){
        $types = FacultyTypeEdu::where('faculty_id' , $id)->pluck('type_education_id');
        $edus = Edutype::whereIn('id' , $types)->get();
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
     * @param  \App\FacultyTypeEdu  $facultyTypeEdu
     * @return \Illuminate\Http\Response
     */
    public function show(FacultyTypeEdu $facultyTypeEdu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FacultyTypeEdu  $facultyTypeEdu
     * @return \Illuminate\Http\Response
     */
    public function edit(FacultyTypeEdu $facultyTypeEdu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FacultyTypeEdu  $facultyTypeEdu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacultyTypeEdu $facultyTypeEdu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FacultyTypeEdu  $facultyTypeEdu
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacultyTypeEdu $facultyTypeEdu)
    {
        //
    }
}
