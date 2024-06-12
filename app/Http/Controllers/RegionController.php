<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function change_region_status($id , $value){
        $region = Region::find($id);
        $region->status = $value;
        if($region->update()){
            return redirect(url()->previous())->with('success' , 'Malumot o`zgartirildi');
        }
        else{
            return redirect(url()->previous())->with('error' , 'Xatolik!');
        }
    }
    public function get_regions($c_id){
        $regions = Region::where('country_id' , $c_id)->where('status' , 1)->get();
        return json_encode($regions);
    }
    
    public function index()
    {
        $regions = Region::all();
        return view('superadmin.pages.datas.region.index' , [
            'regions' => $regions,
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
        $region = new Region();
        $region->name_uz = $request->name_uz;
        $region->name_en = $request->name_en;
        $region->name_ru = $request->name_ru;
        $region->country_id = $request->country_id;
        $region->save();
        return redirect(url()->previous())->with('success' , 'Malumot qo`shildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $region =  Region::find($id);
        $region->name_uz = $request->name_uz;
        $region->name_en = $request->name_en;
        $region->name_ru = $request->name_ru;
        $region->update();
        return redirect(url()->previous())->with('success' , 'Malumot o`zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = Region::find($id);
        if ($region->delete()) {
            return redirect(url()->previous())->with('success' , 'Malumot o`chirildi');
        }
    }
}
