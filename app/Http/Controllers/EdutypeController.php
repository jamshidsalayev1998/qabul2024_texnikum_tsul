<?php

namespace App\Http\Controllers;

use App\Edutype;
use Illuminate\Http\Request;

class EdutypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edutypes = Edutype::all();
        return view('superadmin.pages.datas.edutype.index' , [
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
        $edutype = new Edutype();
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
    public function show(Edutype $edutype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Edutype  $edutype
     * @return \Illuminate\Http\Response
     */
    public function edit(Edutype $edutype)
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
        $edutype =  Edutype::find($id);
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
        $e = Edutype::find($id);
        $e->delete();
        return redirect(url()->previous())->with('success' , 'Ma`lumot o`chirildi');
    }
}
