<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Admin;
use App\User;
use App\Petition;
use App\Area;
use App\Region;
use App\Faculty;
use App\Country;
use App\Endegree;
use App\Typeschool;
use App\FacultyTypeEdu;
use App\FacultyTypeLang;
use App\Edutype;
use App\Languagetype;
use App\Disability;
use App\Editing;
use App\SmsSend;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Hash;


class SuperadminController extends Controller
{


	public function delete_petition($id){
		if (Auth::user()->role == 3) {
			$petition = Petition::find($id);
            if (User::where('id'  , $petition->user_id)->exists()) {
                $phone_send = User::find($petition->user_id)->email;
                $phone_send = str_replace('+', '', $phone_send);
                $string = 'Sizning arizangizdagi xatoliklar tufayli arizangiz qaytarildi.Tizimdan qayta ro`yhatdan o`tishingizni va arizani qayta to`ldirishingizni so`raymiz!';
                $sms_send = new SmsSend();
                $response = $sms_send->send_one_sms($phone_send, $string);
                $user = User::find($petition->user_id);
                $user->delete();
            }
            // $fil_p = public_path('users/documents/image').'/'.$petition->image;
            // if (file_exists($fil_p)) {
            //     unlink($fil_p);
            // }
            // $fil_p = public_path('users/documents/diplom_images').'/'.$petition->diplom_image;
            // if (file_exists($fil_p)) {
            //     unlink($fil_p);
            // }
            // $fil_p = public_path('users/documents/passport_images').'/'.$petition->passport_image;
            // if (file_exists($fil_p)) {
            //     unlink($fil_p);
            // }
            // $fil_p =  public_path('users/documents/english_images').'/'.$petition->english_image;
            // if (file_exists($fil_p)) {
            //     unlink($fil_p);
            // }
			$petition->delete();
			return redirect(route('admin.index'));
		}
		else{
			return redirect('/home');
		}
	}

	 public function edit_petition( $id)
    {
        $p = Petition::find($id);
        if ( Auth::user()->role == 3  ) {

            $country = Country::all();
            $regions = Region::where('country_id' , $p->country_id)->get();
            $areas = Area::where('region_id' , $p->region_id)->get();
            $typeschool = Typeschool::all();
            $endegree = Endegree::all();
            $faculties = Faculty::all();
            $edp = FacultyTypeEdu::where('faculty_id' , $p->faculty_id)->pluck('type_education_id');
            $edutypes = Edutype::whereIn('id' , $edp)->get();
            $edl = FacultyTypeLang::where('faculty_id' , $p->faculty_id)->pluck('type_language_id');

            $languagetype = Languagetype::whereIn('id' , $edl)->get();
            $disability = Disability::all();
            $edits = Editing::where('petition_id' , $id)->get();
            $i = 0;
            $a = [];

            foreach ($edits as $k) {
                $a[$i] = $k->column;
                $i++;
            }
            if ($p->status != 2) {
                return view('superadmin.pages.petition.edit' , [
                    'petition' => $p,
                    'country' => $country,
                    'regions' => $regions,
                    'areas' => $areas,
                    'typeschool' => $typeschool,
                    'endegree' => $endegree,
                    'faculties' => $faculties,
                    'edutypes' => $edutypes,
                    'languagetype' => $languagetype,
                    'disability' => $disability,
                    'edits' => $a,
                ]);
            }
            else{
                return redirect(url()->previous());
            }
        }
        else{
            return redirect(route('check_status'));
        }

    }

    function randomPassword() {
	    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 4; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); //turn the array into a string
	}

	public function update_petition(Request $request , $id){
		$pet = Petition::find($id);
		 $rules = [
	        'last_name' => ['required','min:3','max:255' , 'regex:/^[a-zA-Z .,\'`]*$/'],

	        'first_name' => ['required','min:3','max:255', 'regex:/^[a-zA-Z .,\'`]*$/'],

	        'middle_name' => ['required','min:3','max:255' , 'regex:/^[a-zA-Z .,\'`]*$/'],
	        'gender' => 'required',
	        'birth_date' => 'required|after:1885-07-01|before:2005-07-01',
	        'image' => [ 'image'],
	        'country_id' => ['required' , 'regex: /^[0-9]*$/'],
	        'region_id' => ['required' , 'regex: /^[0-9]*$/'],
	        'area_id' => ['required' , 'regex: /^[0-9]*$/'],
	        'address' => ['required','min:3','max:255' ],
	        'citizenship' => ['required','min:3','max:255'],
	        'nationality' => ['required','min:3','max:255'],
	        'passport_seria' => ['required','min:3','max:50' , 'regex: /^[A-Z]{2}[0-9]{7}/'],
	        'passport_image' => [ 'image'],
	        'mobile_phone' => ['required'],
	        'home_phone' =>  ['required'],
	        'father_phone' => ['required'],
	        'mother_phone' => ['required'],
	        'school' => ['required','min:3','max:255'],
	        'type_school' => ['required'],
	        'graduation_date' => ['required'],
	        'diplom_number' => ['required','min:3','max:255'],
	        'diplom_image' => [ 'image'],
	        'english_degree' => ['required'],
	        'faculty_id' => 'required',
	        'type_education_id' => ['required'],
	        'type_language_id' => 'required',
	        'disability_status_id' => 'required',
	        'english_image' => ['image'],
	    ];
		 $validator = Validator::make($request->all() , $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        else{
            if (Auth::check() && Auth::user()->role == 3 ) {
                $pet->last_name = $request->last_name;
                $pet->first_name = $request->first_name;
                $pet->middle_name = $request->middle_name;
                $pet->gender = $request->gender;
                $pet->birth_date = date('Y-m-d' , strtotime($request->birth_date));
                $pet->country_id = $request->country_id;
                $pet->region_id = $request->region_id;
                $pet->area_id = $request->area_id;
                $pet->address = $request->address;
                $pet->citizenship = $request->citizenship;
                $pet->nationality = $request->nationality;
                $pet->passport_seria = str_replace(' ' , '' , $request->passport_seria);
                $pet->home_phone = $request->home_phone;
                $pet->mobile_phone = $request->mobile_phone;
                $pet->father_phone = $request->father_phone;
                $pet->mother_phone = $request->mother_phone;
                $pet->school = $request->school;
                $pet->type_school = $request->type_school;
                $pet->graduation_date = $request->graduation_date;
                $pet->diplom_number = $request->diplom_number;
                $pet->english_degree = $request->english_degree;
                $pet->overall_score_english = $request->overall_score_english;
                $pet->ilts_number = $request->ilts_number;
                $pet->faculty_id = $request->faculty_id;
                $pet->type_education_id = $request->type_education_id;
                $pet->type_language_id = $request->type_language_id;
                $pet->disability_status_id = $request->disability_status_id;
                $pet->disability_description = $request->disability_description;
                //images store
                $nomiga = $this->randomPassword();
               		 if ($request->hasFile('image')) {
                            $fil_p = public_path('users/documents/image').'/'.$pet->image;
                                if (file_exists($fil_p)) {
                                    unlink($fil_p);
                                    $image = $request->file('image');
                                    $image_extension = $image->getClientOriginalExtension();
                                    $fio = $request->last_name.'_'.$request->first_name.'_'.$nomiga;
                                    $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                                    $image_name = str_replace(" ", '_', $image_name);
                                    if ($image->move('users/documents/image' , $image_name)) {
                                        $pet->image = $image_name;
                                    }

                            }
                            else{
                                 $image = $request->file('image');
                                    $image_extension = $image->getClientOriginalExtension();
                                    $fio = $request->last_name.'_'.$request->first_name.'_'.$nomiga;
                                    $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                                    $image_name = str_replace(" ", '_', $image_name);
                                    if ($image->move('users/documents/image' , $image_name)) {
                                        $pet->image = $image_name;
                            }


                        }
                    }


                    // diplom images store
                      if ($request->hasFile('diplom_image')) {
                        $fil_p = public_path('users/documents/diplom_images').'/'.$pet->diplom_image;
                         if (file_exists($fil_p)) {
                                 if (unlink($fil_p)) {
                                   $image = $request->file('diplom_image');
                                    $image_extension = $image->getClientOriginalExtension();
                                    $fio = $request->last_name.'_'.$request->first_name.'_'.$nomiga.'_diplom';
                                    $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                                    $image_name = str_replace(" ", '_', $image_name);
                                    if ($image->move('users/documents/diplom_images' , $image_name)) {
                                        $pet->diplom_image = $image_name;
                                    }
                                }
                             }
                             else{
                                 $image = $request->file('diplom_image');
                                    $image_extension = $image->getClientOriginalExtension();
                                    $fio = $request->last_name.'_'.$request->first_name.'_'.$nomiga.'_diplom';
                                    $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                                    $image_name = str_replace(" ", '_', $image_name);
                                    if ($image->move('users/documents/diplom_images' , $image_name)) {
                                        $pet->diplom_image = $image_name;
                                     }


                        }
                    }
                    // passport images store
                    if ($request->hasFile('passport_image')) {
                        $fil_p = public_path('users/documents/passport_images').'/'.$pet->passport_image;
                        if (file_exists($fil_p)) {
                            if (unlink($fil_p)) {
                               $image = $request->file('passport_image');
                                $image_extension = $image->getClientOriginalExtension();
                                $fio = $request->last_name.'_'.$request->first_name.'_'.$nomiga.'_passport';
                                $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                                $image_name = str_replace(" ", '_', $image_name);
                                if ($image->move('users/documents/passport_images' , $image_name)) {
                                    $pet->passport_image = $image_name;
                                }
                            }
                        }
                        else{
                             $image = $request->file('passport_image');
                                $image_extension = $image->getClientOriginalExtension();
                                $fio = $request->last_name.'_'.$request->first_name.'_'.$nomiga.'_passport';
                                $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                                $image_name = str_replace(" ", '_', $image_name);
                                if ($image->move('users/documents/passport_images' , $image_name)) {
                                    $pet->passport_image = $image_name;
                                }
                        }


                    }
                    if ($request->hasFile('english_image')) {
                         $fil_p = public_path('users/documents/english_images').'/'.$pet->english_image;
                          if (file_exists($fil_p)) {
                            if (unlink($fil_p)) {
                               $image = $request->file('english_image');
                                $image_extension = $image->getClientOriginalExtension();
                                $fio = $request->last_name.'_'.$request->first_name.'_'.$nomiga.'_english';
                                $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                                $image_name = str_replace(" ", '_', $image_name);
                                if ($image->move('users/documents/english_images' , $image_name)) {
                                    $pet->english_image = $image_name;
                                }
                            }
                          }
                          else{
                             $image = $request->file('english_image');
                                $image_extension = $image->getClientOriginalExtension();
                                $fio = $request->last_name.'_'.$request->first_name.'_'.$nomiga.'_english';
                                $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                                $image_name = str_replace(" ", '_', $image_name);
                                if ($image->move('users/documents/english_images' , $image_name)) {
                                    $pet->english_image = $image_name;
                                }
                          }


                    }
                $pet->save();
                return redirect(route('admin.show' , ['id' => $id]));



            }
            else{
                return redirect(route('check_status'));
            }
        }


	}

	public function superadmin_regions(){
		$regions = Region::all();
		return view('superadmin.pages.datas.region.index' , [
			'regions' => $regions,
		]);
	}

	public function sup_update(Request $request , $id){
		// return $request;
		$petition = Petition::find($id);
		$petition->region_id = $request->region_id;
		$petition->area_id = $request->area_id;
		$petition->sup_edit = 1;
		$petition->update();
		return redirect(url()->previous());
	}
	public function petition_edit(){
		$petition = Petition::where('sup_edit' , 0)->paginate(20);
		$regions = Region::all();
		$area = Area::all();
		return view('superadmin.pages.petition.index' , [
			'petitions' => $petition,
			'regions' => $regions,
			'area' => $area,
		]);
	}
	public function petition_datas(){
		return view('superadmin.pages.datas.index');
	}

    public function admins_index(){
    	if (Auth::user()->role == 3 && Auth::user()->email_status == 1) {
    		$admins = Admin::where('status' , 1)->get();
	    	return view('superadmin.pages.admins.index' , [
	    		'data' => $admins,
	    	]);
    	}
    	else{
    		return redirect(route('home'));
    	}

    }

    public function admins_store(Request $request){
    	if (Auth::user()->role == 3 && Auth::user()->email_status == 1) {
    		$validator = Validator::make($request->all() , [
    			'first_name' => ['required' ],
    			'middle_name' => ['required'],
    			'last_name' => ['required' ],
    			'email' => ['required', 'string','max:255', 'unique:users'],
            	'password' => ['required', 'string', 'min:8', 'confirmed'],
    		]);
	        if (User::where('email' , $request->email)->exists()) {
                $user = User::where('email' , $request->email)->first();
                $user->delete();
            }
	        $user = new User();
	        $user->email = $request->email;
	        $user->password = Hash::make($request->password);
	        $user->role = $request->role;
	        $user->email_status = 1;
	        $code = '1111';
	        // $code = uniqid();
	        // $details = [
	        //     'code' =>$code,
	        //     'body' => 'sjkdhfuhdsflk'
	        // ];
	        // \Mail::to($request->email)->send(new SendMail($details));
	        $user->email_code = $code;
	        if ($user->save()) {
	        	$admin = new Admin();
	        	$admin->last_name = $request->last_name;
	        	$admin->first_name = $request->first_name;
	        	$admin->middle_name = $request->middle_name;
	        	$admin->user_id = $user->id;
	        	$admin->save();
	        	return redirect(url()->previous())->with('success' , 'Admin qo`shildi');
		     }

    	}
    	else{
    		return redirect(route('home'));
    	}

    }
    public function admins_update(Request $request , $id){
    	if (Auth::user()->role == 3 && Auth::user()->email_status == 1) {
    		$validator = Validator::make($request->all() , [
    			'first_name' => ['required' ],
    			'middle_name' => ['required'],
    			'last_name' => ['required' ],
    			'email' => ['required', 'string','max:255'],
    			'role' => ['required'],
    		]);
	        if ($validator->fails()) {
	        	// return response($validator);
	            return back()->withErrors($validator)->withInput();
	        }
	        $admin = Admin::find($id);
	        $user =User::find($admin->user_id);
	        $user->email = $request->email;
	        $user->role = $request->role;
	        if ($user->update()) {

	        	$admin->last_name = $request->last_name;
	        	$admin->first_name = $request->first_name;
	        	$admin->middle_name = $request->middle_name;
	        	$admin->update();
	        	return redirect(url()->previous())->with('success' , 'Admin o`zgartirildi');
		     }

    	}
    	else{
    		return redirect(route('home'));
    	}

    }
    public function admins_update_password(Request $request , $id){
    	if (Auth::user()->role == 3 && Auth::user()->email_status == 1) {
    		$validator = Validator::make($request->all() , [

            	'password' => ['required', 'string', 'min:8', 'confirmed'],
    		]);
	        if ($validator->fails()) {
	        	// return response($validator);
	            return back()->withErrors($validator)->withInput();
	        }
	        $admin = Admin::find($id);
	        $user =User::find($admin->user_id);
	        $user->password = Hash::make($request->password);
	        $user->update();
	        return redirect(url()->previous())->with('success' , 'Parol o`zgartirildi');

    	}
    	else{
    		return redirect(route('home'));
    	}

    }
    public function admins_delete($id){
    	if (Auth::user()->role == 3 && Auth::user()->email_status == 1) {
    		$admin = Admin::find($id);
    		$user = User::find($admin->user_id);

    		if ($admin->delete() && $user->delete()) {
	        return redirect(url()->previous())->with('success' , 'Admin o`chirildi');

    		}
    		else{
	        return redirect(url()->previous())->with('error' , 'Xatolik');

    		}
    	}
    }
}
