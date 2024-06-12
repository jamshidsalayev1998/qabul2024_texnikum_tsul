<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petition;
use App\Faculty;
use App\Languagetype;
use App\Typeschool;
use App\Region;
use App\Endegree;
use App\Edutype;
use App\Disability;
use App\Country;
use App\User;
use App\Area;
use App\FacultyTypeLang;
use App\FacultyTypeEdu;
use Illuminate\Support\Facades\Hash;

use DB;
class TogirlaController extends Controller
{

	public function bitta_dub(){
		$user = User::where('email' , '+998991025203')->pluck('id');
		$petition = Petition::whereIn('user_id' , $user)->get();
		return $petition;
	}


	public function dub_passport(){
		// $pets = Petition::where('passport_seria' , '=' , 'AB0991204')->get();
		$pets = Petition::all();
		$idlar = [];
		$i = 0;
		foreach ($pets as $key) {
			if (Petition::where('passport_seria' , $key->passport_seria)->count() >= 2) {
				$idlar[$i] = $key->passport_seria;
				$i++;
			}
		}
		return array_unique($idlar);
		// return $pets;
	}

	public function togirliman(){
		$pets = Petition::all();
		$idlar = [];
		$i = 0;
		foreach ($pets as $key) {
			if (Petition::where('passport_seria' , $key->passport_seria)->count() >= 2) {
				$idlar[$i] = $key->passport_seria;
				$i++;
			}
		}
		$res = array_unique($idlar);
		// return $res;
		$dellar = 0;
		foreach ($res as $k) {
			if (Petition::where('passport_seria' , $k)->count() >= 2) {
				$pp = Petition::where('passport_seria' , $k)->get();
				$yy = 0;
				foreach ($pp as $value) {
					if ($value->status == 2) {
						$yy = $value->id;
					}
				}
				if ($yy == 0) {
					foreach ($pp as $value) {
						if ($value->yangi == null) {
							$yy = $value->id;
						}
					}
				}
				if ($yy == 0) {
					$yy = $pp[0]->id;
				}
				if ($yy != 0) {
					foreach ($pp as $vv) {
						if ($vv->id != $yy) {
							$vv->delete();
							$dellar++;
						}
					}
				}
				
			}
		}
		return $dellar;

	}

	public function togirla_bax(){
		// $user = User::find(10054);
		// $user->password = Hash::make('pppp1111');
		// $user->update();
		// $user = User::where('email' , '+998935083779')->first();
		// return $user;
		// $petition = Petition::where('user_id' , 10054)->first();
		// return $petition;
		// $user = User::where('email' , '+998974344789')->get();
		// return $user;
		// $user->password = Hash::make('pppp1111');
		// $user->update();
		$users = User::all();
		$abb = [];
		$i = 0;
		foreach ($users as $key) {
			if (User::where('email' , $key->email)->count() >=2) {
				// $abb[$i] = $key->email;
				$i++;
				// return 
			}

		}
		// return $abb;

	}
	public function togirla_dublikat(){
		$petitions = Petition::where('status' , -1)->get();
		// return $petitions;
		foreach ($petitions as $k) {
			$k->status = 1;
			$k->update();
		}
		return "boldi";
	}
	public function togirla(){
		 $abit = DB::table('abiturient as ab')->select([
		 	'ab.*',
		 	'ab_fak.faculty',
		 	'ab_fak.edu_lang',
		 	'ab_fak.disability',
		 	'ab_fak.disability_info',
		 	'ab_fak.type as edu_type',
		 	'res.country',
		 	'res.region',
		 	'res.city',
		 	'res.district',
		 	'res.address',
		 	'res.citizenship',
		 	'res.nationality',
		 	'con.home',
		 	'con.mobile',
		 	'con.mother',
		 	'con.father',
		 	'dip.name',
		 	'dip.type as sch_type',
		 	'dip.date',
		 	'dip.number as dip_number',
		 	'dip.photo as dip_photo',
		 	'eng.type as eng_type',
		 	'eng.band',
		 	'eng.number as eng_number',
		 	'eng.photo as eng_photo',
		 	'pass.number as pass_number',
		 	'pass.photo as pass_photo',

		 ])
		 ->leftJoin('abiturient_faculty as ab_fak' , function($join){
		 	$join->on('ab_fak.abiturient_id' , '=' , 'ab.id');
		 })
		 ->leftJoin('abiturient_residence_info as res' , function($join2){
		 	$join2->on('res.abiturient_id' , '=' , 'ab.id');
		 })
		 ->leftJoin('contacts as con' , function($join3){
		 	$join3->on('con.abiturient_id' , '=' , 'ab.id');
		 })
		 ->leftJoin('diploma as dip' , function($join4){
		 	$join4->on('dip.abiturient_id' , '=' , 'ab.id');
		 })
		 ->leftJoin('english_graduate as eng' , function($join5){
		 	$join5->on('eng.abiturient_id' , '=' , 'ab.id');
		 })
		 ->leftJoin('passport as pass' , function($join6){
		 	$join6->on('pass.abiturient_id' , '=' , 'ab.id');
		 })
		 ->get();
		 $regions = DB::table('region')->select('*')->get();
		 foreach ($abit as $ab) {
		 	$pet = new Petition();
		 	$pet->first_name = $ab->firstname;
		 	$pet->last_name = $ab->surname;
		 	$pet->middle_name = $ab->middlename;
		 	if ($ab->gender == 'Female') {
		 		$gender = 0;
		 	}
		 	else{
		 		$gender = 1;
		 	}
		 	$pet->gender = $gender;
		 	$pet->user_id = $ab->user_id;
		 	$pet->image = $ab->photo;
		 	$pet->birth_date = date('Y-m-d' , strtotime($ab->birthday));
		 	$pet->status = $ab->status;
		 	$pet->comment = $ab->comment;
		 	$pet->abt_id = $ab->id;
		 	if (!Faculty::where('name_uz' , '=' , $ab->faculty)->exists()) {
		 		$fak_id = 0;
		 	}
		 	else{
		 	$fak_id = Faculty::where('name_uz' , '=' , $ab->faculty)->first()->id;

		 	}
		 	$pet->faculty_id = $fak_id;
		 	if (!Languagetype::where('name_en' , '=' , $ab->edu_lang)->exists()) {
		 		$lang_id = 0;
		 	}
		 	else{
		 	$lang_id = Languagetype::where('name_en' , '=' , $ab->edu_lang)->first()->id;

		 	}
		 	$pet->type_language_id = $lang_id;
		 	// if (!Disability::where('name_uz' , '=' , $ab->disability)->exists()) {
		 	// 	return $ab->disability;
		 	// }
		 	$dis_id = Disability::where('name_uz' , '=' , $ab->disability)->first()->id;
		 	$pet->disability_status_id = $dis_id;
		 	$pet->disability_description = $ab->disability_info;
		 	if ($ab->edu_type != "") {
		 		$edu_type_id = Edutype::where('name_uz' , $ab->edu_type)->first()->id;
		 		$pet->type_education_id = $edu_type_id;
		 	}
		 	else{
		 		$pet->type_education_id=0;
		 	}
		 	
		 	$country_id = Country::where('name_en' , '=' , $ab->country)->first()->id;
		 	$pet->country_id = $country_id;
		 	foreach ($regions as $reg) {
		 		if ($reg->name == $ab->region) {
		 			$reg_id = $reg->didi;
		 		}
		 	}
		 	$pet->region_id = $reg_id;
		 	$pet->area_name = $ab->city;
		 	$pet->address = $ab->address;
		 	$pet->citizenship = $ab->citizenship;
		 	$pet->nationality = $ab->nationality;
		 	$pet->home_phone = $ab->home;
		 	$pet->mobile_phone = $ab->mobile;
		 	$pet->father_phone = $ab->father;
		 	$pet->mother_phone = $ab->mother;
		 	$pet->school = $ab->name;
		 	$type_school_id = Typeschool::where('name_uz' , '=' , $ab->sch_type)->first()->id;
		 	$pet->type_school = $type_school_id;
		 	$pet->graduation_date = $ab->date;
		 	$pet->diplom_number = $ab->dip_number;
		 	$pet->diplom_image = $ab->dip_photo;
		 	// if (!Endegree::where('name_uz' , '=' , $ab->eng_type)->exists()) {
		 	// 	return $ab->eng_type;
		 	// }
		 	$eng_degree_id = Endegree::where('name_uz' , '=' , $ab->eng_type)->first()->id;
		 	$pet->english_degree = $eng_degree_id;
		 	$pet->overall_score_english = $ab->band;
		 	$pet->ilts_number = $ab->eng_number;
		 	$pet->english_image = $ab->eng_photo;
		 	$pet->passport_seria = $ab->pass_number;
		 	$pet->passport_image = $ab->pass_photo;
		 	$pet->save();


		 }
    	return $abit;
	}

	public function togirla_faculty(){
		$fak = DB::table('faculty')->select(['*'])->get();
		foreach ($fak as $f) {
			$fac = new Faculty();
			$fac->name_uz = $f->name;
			$fac->name_en = $f->name;
			$fac->name_ru = $f->name;
			$fac->save();
		}
		return "boldi";
	}

	public function togirla_user(){
		$users = DB::table('ytit_user')->select('*')->get();
		foreach ($users as $key ) {
			$u = new User();
			$u->id = $key->id;
			$u->email = $key->email;
			$u->password = $key->password_hash;
			$u->email_status = 1;
			$u->role = 0;
			$u->save();

		}
	}

	public function togirla_area()
	{
		$petitions = Petition::all();
		foreach ($petitions as $k) {
			$city = DB::table('city')->where('name' , $k->area_name)->first();
			if (DB::table('city')->where('name' , $k->area_name)->exists()) {
				$area = Area::where('city_id' , '=' , $city->id)->first();
				if (Area::where('city_id' , '=' , $city->id)->exists()) {
					$k->area_id = $area->id;
					$k->update();
				}
			}
		}
		return "tugaadi";
	}
	public function togirla_area_name(){
		$areas = Area::all();
		foreach ($areas as $k) {
			$k->name_en = $k->name_uz;
			$k->name_ru = $k->name_uz;
			$k->update();
		}
		return "boldi";
	}

	public function togirla_fac_lang(){
		$faculties = Faculty::pluck('id');
		$lang = Languagetype::pluck('id');
		foreach ($faculties as $f) {
			foreach ($lang as $l) {
				$fl = new FacultyTypeLang();
				$fl->faculty_id = $f;
				$fl->type_language_id = $l;
				$fl->save();
			}
		}
		return "boldi";
	}
   
}
