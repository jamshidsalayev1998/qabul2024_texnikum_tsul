<?php

namespace App\Http\Controllers;

use App\Languagetype;
use App\FacultyTypeLang;
use Illuminate\Http\Request;

class LanguagetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languagetypes = Languagetype::all();
        return view('superadmin.pages.datas.languagetype.index' , [
            'languagetypes' => $languagetypes,
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
        $edutype = new Languagetype();
        $edutype->name_uz = $request->name_uz;
        $edutype->name_en = $request->name_en;
        $edutype->name_ru = $request->name_ru;
        $edutype->save();
        return redirect(url()->previous())->with('success' , 'Malumot qo`shildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Languagetype  $languagetype
     * @return \Illuminate\Http\Response
     */
    public function show(Languagetype $languagetype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Languagetype  $languagetype
     * @return \Illuminate\Http\Response
     */
    public function edit(Languagetype $languagetype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Languagetype  $languagetype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edutype =  Languagetype::find($id);
        $edutype->name_uz = $request->name_uz;
        $edutype->name_en = $request->name_en;
        $edutype->name_ru = $request->name_ru;
        $edutype->update();
        return redirect(url()->previous())->with('success' , 'Malumot o`zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Languagetype  $languagetype
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $l = Languagetype::find($id);
        $types = FacultyTypeLang::where('type_language_id' , $id)->get();
        foreach ($types as $k) {
            $k->delete();
        }
        $l->delete();
        return redirect(url()->previous())->with('success' , 'Ma`lumot o`chirildi');
    }
}
