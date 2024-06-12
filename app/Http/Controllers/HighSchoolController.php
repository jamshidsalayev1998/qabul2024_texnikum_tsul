<?php

namespace App\Http\Controllers;

use App\HighSchool;
use Illuminate\Http\Request;

class HighSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edutypes = HighSchool::all();
        return view('superadmin.pages.datas.high_school.index' , [
            'edutypes' => $edutypes,
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
        $edutype = new HighSchool();
        $edutype->name_uz = $request->name_uz;
        $edutype->name_en = $request->name_en;
        $edutype->name_ru = $request->name_ru;
        $edutype->save();
        return redirect(url()->previous())->with('success' , 'Malumot qo`shildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Edutype  $edutype
     * @return \Illuminate\Http\Response
     */
    public function show(HighSchool $edutype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Edutype  $edutype
     * @return \Illuminate\Http\Response
     */
    public function edit(HighSchool $edutype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Edutype  $edutype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $edutype =  HighSchool::find($id);
        $edutype->name_uz = $request->name_uz;
        $edutype->name_en = $request->name_en;
        $edutype->name_ru = $request->name_ru;
        $edutype->update();
        return redirect(url()->previous())->with('success' , 'Malumot o`zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Edutype  $edutype
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $e = HighSchool::find($id);
        $e->delete();
        return redirect(url()->previous())->with('success' , 'Ma`lumot o`chirildi');
    }
}
