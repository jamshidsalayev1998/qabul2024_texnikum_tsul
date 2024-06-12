<?php

namespace App\Http\Controllers;

use App\Editing;
use App\HighSchoolDocumentEnable;
use Illuminate\Http\Request;

class EditingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get_enable_documents($id){
        $enableds = HighSchoolDocumentEnable::where('high_school_id' , $id)->get();
        return json_encode($enableds);
    }

    public function get_edits($id){
        $edits = Editing::where('petition_id' , $id)->get();
        return json_encode($edits);
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
     * @param  \App\Editing  $editing
     * @return \Illuminate\Http\Response
     */
    public function show(Editing $editing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Editing  $editing
     * @return \Illuminate\Http\Response
     */
    public function edit(Editing $editing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Editing  $editing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Editing $editing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Editing  $editing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editing $editing)
    {
        //
    }
}
