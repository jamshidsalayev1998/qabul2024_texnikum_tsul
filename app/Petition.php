<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{

    // public $start_date =
    public $rules = [
        'last_name' => ['required','min:2','max:255' , 'regex:/^[a-zA-Z .,\'`]*$/'],

        'first_name' => ['required','min:2','max:255', 'regex:/^[a-zA-Z .,\'`]*$/'],

        'middle_name' => ['required','min:2','max:255' , 'regex:/^[a-zA-Z .,\'`]*$/'],
        'gender' => 'required',
        'birth_date' => 'required',
//        'image' => ['required' , 'image'],
//        'country_id' => ['required' , 'regex: /^[0-9]*$/'],
//        'region_id' => ['required' , 'regex: /^[0-9]*$/'],
//        'area_id' => ['required' , 'regex: /^[0-9]*$/'],
//        'address' => ['required','min:2','max:255' ],
//        'citizenship' => ['required','min:2','max:255'],
//        'nationality' => ['required','min:2','max:255'],
        'passport_seria' => ['required','min:2','max:50'],
        'passport_image' => ['required' ],
//        'mobile_phone' => ['required'],
//        'home_phone' =>  ['required'],
//        'father_phone' => ['required'],
//        'mother_phone' => ['required'],
        'school' => ['required','min:2','max:255'],
        'type_school' => ['required'],
        'graduation_date' => ['required'],
        'diplom_number' => ['required','min:2','max:255'],
        'diplom_image' => ['required' ],
        'english_degree' => ['required'],
        'faculty_id' => 'required|exists:faculties,id',
        'type_education_id' => ['required'],
        'type_language_id' => 'required',
//        'disability_status_id' => 'required',
        'english_image' => [],
    ];
    public $rules_update = [
      'last_name' => ['min:2','max:255' , 'regex:/^[a-zA-Z .,\'`]*$/'],

        'first_name' => ['min:2','max:255', 'regex:/^[a-zA-Z .,\'`]*$/'],

        'middle_name' => ['min:2','max:255' , 'regex:/^[a-zA-Z .,\'`]*$/'],
        'birth_date' => 'after:1885-07-01|before:2005-07-01',
        'image' => [ 'image'],
//        'country_id' =>  'regex: /^[0-9]*$/',
//        'region_id' =>  'regex: /^[0-9]*$/',
//        'area_id' =>  'regex: /^[0-9]*$/',
//        'address' => ['min:2','max:255' ],
//        'citizenship' => ['min:2','max:255'],
//        'nationality' => ['min:2','max:255'],
        'passport_seria' => ['min:2','max:50'],
        'passport_image' => [],
        'school' => ['min:2','max:255'],
        'diplom_number' => ['min:2','max:255'],
        'diplom_image' => [''],
        'faculty_id' => 'regex: /^[0-9]*$/',
        'type_education_id' => ['regex: /^[0-9]*$/'],
        'type_language_id' => 'regex: /^[0-9]*$/',
        'disability_status_id' => 'regex: /^[0-9]*$/',
        'english_image' => [],
    ];
    protected $table = 'petitions';
    protected $fillable = [
    	'last_name',
    	'first_name',
    	'middle_name',
    	'gender',
    	'birth_date',
    	'image',
    	'country_id',
    	'region_id',
    	'area_id',
    	'address',
    	'citizenship',
    	'nationality',
    	'passport_seria',
    	'passport_number',
    	'passport_image',
    	'home_phone',
    	'mobile_phone',
    	'father_phone',
    	'mother_phone',
    	'school',
    	'type_school',
    	'graduation_date',
    	'diplom_number',
    	'diplom_image',
    	'english_degree',
    	'overall_score_english',
    	'ilts_number',
    	'english_image',
    	'faculty_id',
    	'type_education_id',
    	'type_language_id',
    	'disability_status_id',
    	'disability_description',
    	'user_id',
    	'status'
    ];

    public function getUser(){
    	$user = User::find($this->user_id);
    	return $user;
    }
    public function getCountry(){
    	$country = Country::find($this->country_id);
    	return $country;
    }
    public function getRegion(){
        if (Region::where('id' , $this->region_id)->exists()) {
            $region = Region::find($this->region_id);
        }
        else{
            $region = new Region();
        }

        return $region;
    }
    public function getArea(){
        $area = Area::find($this->area_id);
        if (Area::where('id' , $this->area_id)->exists()) {
            return $area;
        }
        else{
            $area2 = new Area();
            return $area2;
        }
    }
    public function getTypeschool(){
        $tys = Typeschool::find($this->type_school);
        if (Typeschool::where('id' , $this->type_school)->exists()) {
            return $tys;
        }
        else{
            $tys2 = new Typeschool();
            return $tys2;
        }
    }
    public function getEndegree(){
        $tys = Endegree::find($this->english_degree);
        if (Endegree::where('id' , $this->english_degree)->exists()) {
            return $tys;
        }
        else{
            $tys2 = new Endegree();
            return $tys2;
        }
    }
    public function getFaculty(){
        $tys = Faculty::find($this->faculty_id);
        if (Faculty::where('id' , $this->faculty_id)->exists()) {
            return $tys;
        }
        else{
            $tys2 = new Faculty();
            return $tys2;
        }
    }
    public function getEdutype(){
        $tys = Edutype::find($this->type_education_id);
        if (Edutype::where('id' , $this->type_education_id)->exists()) {
            return $tys;
        }
        else{
            $tys2 = new Edutype();
            return $tys2;
        }
    }
    public function getLanguagetype(){
        $tys = Languagetype::find($this->type_language_id);
        if (Languagetype::where('id' , $this->type_language_id)->exists()) {
            return $tys;
        }
        else{
            $tys2 = new Languagetype();
            return $tys2;
        }
    }
    public function getDisability(){
        $tys = Disability::find($this->disability_status_id);
        if (Disability::where('id' , $this->disability_status_id)->exists()) {
            return $tys;
        }
        else{
            $tys2 = new Disability();
            return $tys2;
        }
    }
    public function getStatus(){
        if ($this->status < 2) {
            if ($this->status == 0) {
                if (\App::getLocale() == 'uz') {
                   return "Kutilyapti";
                }
                if (\App::getLocale() == 'ru') {
                   return "ожидаемый";
                }
                if (\App::getLocale() == 'en') {
                   return "Waiting";
                }

            }
            else{
                if (\App::getLocale() == 'uz') {
                   return "Qaytarilgan";
                }
                if (\App::getLocale() == 'ru') {
                   return "возвращенный";
                }
                if (\App::getLocale() == 'en') {
                   return "Returned";
                }

            }
        }
        else{
            if (\App::getLocale() == 'uz') {
                   return "Qabul qilingan";
                }
                if (\App::getLocale() == 'ru') {
                   return "принятый";
                }
                if (\App::getLocale() == 'en') {
                   return "Accepted";
                }
        }
    }
    public function getStatusuz(){
        if ($this->status == 0) {
            return "Kutilyapti";
        }
        if ($this->status == 1) {
            return "Qaytarilgan";
        }
        if ($this->status == 2) {
            return "Qabul qilingan";
        }
    }
    public function getGender(){
        if ($this->gender == 1) {
            if (\App::getLocale() == 'uz') {
                return "Erkak";
            }
            if (\App::getLocale() == 'ru') {
                return "мужчина";
            }
            if (\App::getLocale() == 'en') {
                return "Male";
            }
        }
        if ($this->gender == 0) {
            if (\App::getLocale() == 'uz') {
                return "Ayol";
            }
            if (\App::getLocale() == 'ru') {
                return "женщина";
            }
            if (\App::getLocale() == 'en') {
                return "Female";
            }
        }
    }
    public function getGenderuz(){
        if ($this->gender == 1) {
            return "Erkak";
        }
        if ($this->gender == 0) {
            return "Ayol";
        }
    }
    public function high_school(){
        return $this->belongsTo(HighSchool::class , 'high_school_id' , 'id');
    }
    public function getFullAdress(){
        $region = Region::find($this->region_id);
        $area = Area::find($this->area_id);
        $address = $region->name_uz.' '.$area->name_uz.' '.$this->address;
        return $address;

    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id' , 'id');
    }
    public function region()
    {
        return $this->belongsTo(Region::class,'region_id' , 'id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class,'area_id' , 'id');
    }

    public function type_education()
    {
        return $this->belongsTo(Edutype::class,'type_education_id' , 'id');
    }

    public function type_language()
    {
        return $this->belongsTo(Languagetype::class,'type_language_id' , 'id');
    }
    public function conversation_language_student()
    {
        return $this->belongsTo(Languagetype::class,'conversation_language' , 'id');
    }
    public function type_school_student()
    {
        return $this->belongsTo(Typeschool::class,'type_school' , 'id');
    }

    public function english_degree_student()
    {
        return $this->belongsTo(Endegree::class,'english_degree' , 'id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id' , 'id');
    }

    public function disability_status()
    {
        return $this->belongsTo(Disability::class,'disability_status_id' , 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id' , 'id');
    }

}
