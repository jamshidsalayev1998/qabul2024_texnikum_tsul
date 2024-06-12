<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_country_status($id , $value){
        $country = Country::find($id);
        $country->status = $value;
        if($country->update()){
            return redirect(url()->previous())->with('success' , 'Malumot o`zgartirildi');
        }
        else{
            return redirect(url()->previous())->with('error' , 'Xatolik!');
        }
    }
    public function index()
    {
         $regions = Country::all();
        return view('superadmin.pages.datas.country.index' , [
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
        // return $request;
        $region = new Country();
        $region->name_uz = $request->name_uz;
        $region->name_en = $request->name_en;
        $region->name_ru = $request->name_ru;
        $region->save();
        return redirect(url()->previous())->with('success' , 'Malumot qo`shildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $region =  Country::find($id);
        $region->name_uz = $request->name_uz;
        $region->name_en = $request->name_en;
        $region->name_ru = $request->name_ru;
        $region->update();
        return redirect(url()->previous())->with('success' , 'Malumot o`zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = Country::find($id);
        if ($region->delete()) {
            return redirect(url()->previous())->with('success' , 'Malumot o`chirildi');
        }
    }
}
