<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function change_area_status($id , $value){
        $area = Area::find($id);
        $area->status = $value;
        if($area->update()){
            return redirect(url()->previous())->with('success' , 'Malumot o`zgartirildi');
        }
        else{
            return redirect(url()->previous())->with('error' , 'Xatolik!');
        }
    }

    public function get_areas($r_id){
        $areas = Area::where('region_id' , $r_id)->where('status' , 1)->get();
        return json_encode($areas);
    }

    public function index()
    {
        $areas = Area::all();
        return view('superadmin.pages.datas.area.index' , [
            'areas' => $areas,
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
        $area = new Area();
        $area->name_uz = $request->name_uz;
        $area->name_en = $request->name_en;
        $area->name_ru = $request->name_ru;
        $area->region_id = $request->region_id;
        $area->save();
        return redirect(url()->previous())->with('success' , 'Malumot qo`shildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $area = Area::find($id);
        $area->name_uz = $request->name_uz;
        $area->name_en = $request->name_en;
        $area->name_ru = $request->name_ru;
        $area->region_id = $request->region_id;
        $area->update();
        return redirect(url()->previous())->with('success' , 'Malumot o`zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::find($id);
        $area->delete();
        return redirect(url()->previous())->with('success' , 'Ma\'lumot o\'chirildi');
    }
}
