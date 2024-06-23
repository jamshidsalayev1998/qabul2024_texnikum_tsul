<?php

namespace App\Http\Controllers;

use App\Petition;
use App\Country;
use App\Typeschool;
use App\Endegree;
use App\Faculty;
use App\HighSchool;
use App\Edutype;
use App\Disability;
use App\Languagetype;
use App\Area;
use App\Region;
use App\Editing;
use App\FacultyTypeEdu;
use App\FacultyTypeLang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PDF;


class PetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //for newdesign

    public function to_pdf($id)
    {
        if (Auth::user()->email_status == 1) {
            $petition = Petition::find($id);
            $name = str_replace(' ', '_', $petition->last_name . $petition->first_name);
            $name = str_replace('\'', '_', $name);
            $name = str_replace('`', '_', $name);
            return PDF::loadView('admin.pages.petition.to_pdf', [
                'petition' => $petition,
            ])->download($name . '.pdf');
        } else {
            return redirect(route('petition.index'));
        }
    }


    public function index()
    {

        if (Petition::where('user_id', Auth::user()->id)->exists()) {
            return redirect(route('petition.status'));
        } else {

            $date = '2026-06-23 14:10:00';
            if (date('Y-m-d H:i:s') > $date) {
                $country = Country::where('status', 1)->get();
                $typeschool = Typeschool::query()->where('name_uz', 'Texnikum')->get();
                $endegree = Endegree::query()->where('filtr', 1)->get();
                $faculties = Faculty::where('status', 1)->get();
                $edutypes = Edutype::all();
                $languagetype = Languagetype::all();
                $disability = Disability::all();
                $high_schools = HighSchool::where('status', 1)->get();
                // return $typeschool;
                // return $country;
                return view('user.pages.petition.create', [
                    'country' => $country,
                    'typeschool' => $typeschool,
                    'endegree' => $endegree,
                    'faculties' => $faculties,
                    'edutypes' => $edutypes,
                    'languagetype' => $languagetype,
                    'disability' => $disability,
                    'high_schools' => $high_schools
                ]);
            }
            else{
                Auth::logout();
                return "Qabul muddati tugadi.";
                return "Qabul tez orada boshlanadi.";
            }


        }


    }

    public function status()
    {

        if (Auth::check()) {
            if (Auth::user()->role == 0) {
                $petitions = Petition::where('user_id', Auth::user()->id)->first();
                if (Petition::where('user_id', Auth::user()->id)->exists()) {
                    return redirect(route('petition.show', ['id' => $petitions->id]));
                } else {
                    return redirect(route('petition.create'));
                }

                // return view('user.pages.petition.index' , [
                //     'petitions' => $petitions,
                // ]);
            } else {
                return redirect(route('check_status'));
            }

        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 0) {
            if (Petition::where('user_id', Auth::user()->id)->exists()) {
                return redirect(route('petition.status'));
            }
            $country = Country::where('status', 1)->get();
            $typeschool = Typeschool::all();
            $endegree = Endegree::all();
            $faculties = Faculty::where('status', 1)->get();
            $edutypes = Edutype::all();
            $languagetype = Languagetype::all();
            $disability = Disability::all();
            // return $typeschool;
            // return $country;
            return view('user.pages.petition.create', [
                'country' => $country,
                'typeschool' => $typeschool,
                'endegree' => $endegree,
                'faculties' => $faculties,
                'edutypes' => $edutypes,
                'languagetype' => $languagetype,
                'disability' => $disability,
            ]);
        } else {
            return redirect(route('check_status'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//         return $request;
        $pat = new Petition();
        $validator = Validator::make($request->all(), $pat->rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if (Auth::check() && Auth::user()->role == 0) {
                $user = Auth::user();
                $pet = new Petition();
                $pet->user_id = $user->id;
                $pet->last_name = $request->last_name;
                $pet->first_name = $request->first_name;
                $pet->middle_name = $request->middle_name;
                $pet->gender = $request->gender;
                $pet->birth_date = date('Y-m-d', strtotime($request->birth_date));
                $pet->country_id = $request->country_id;
                $pet->region_id = $request->region_id;
                $pet->area_id = $request->area_id;
                $pet->address = $request->address;
                $pet->citizenship = $request->citizenship;
                $pet->nationality = $request->nationality;
                $pet->passport_seria = str_replace(' ', '', $request->passport_seria);
                $pet->passport_given_place = $request->passport_given_place;
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
                $pet->high_school_id = $request->high_school_id;
                $pet->olympics = $request->olympics;
                $pet->labor_activity = $request->labor_activity;
                $pet->conversation_language = $request->conversation_language;
                if ($request->high_school_id == 3) {
                    $pet->punkt = $request->punkt;
                }
                //images store
                $nomiga = $this->randomPassword();
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $image_extension = $image->getClientOriginalExtension();
                    $fio = $nomiga . '_' . $request->passport_seria . '.' . $image_extension;
                    // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                    $image_name = str_replace(" ", '_', $fio);
                    if ($image->move('users/documents/image', $image_name)) {
                        $pet->image = $image_name;
                    }
                }

                // diplom images store
                $image = $request->file('diplom_image');
                $image_extension = $image->getClientOriginalExtension();
                $fio = $nomiga . '_diplom.' . $image_extension;
                // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                $image_name = str_replace(" ", '_', $fio);
                if ($image->move('users/documents/diplom_images', $image_name)) {
                    $pet->diplom_image = $image_name;
                }
                if ($request->hasFile('diplom_image_app')) {
                    $image = $request->file('diplom_image_app');
                    $image_extension = $image->getClientOriginalExtension();
                    $fio = $nomiga . '_diplom_app.' . $image_extension;
                    // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                    $image_name = str_replace(" ", '_', $fio);
                    if ($image->move('users/documents/diplom_images', $image_name)) {
                        $pet->diplom_image_app = $image_name;
                    }
                }

                // passport images store
                $image = $request->file('passport_image');
                $image_extension = $image->getClientOriginalExtension();
                $fio = $nomiga . '_passport.' . $image_extension;
                // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                $image_name = str_replace(" ", '_', $fio);
                if ($image->move('users/documents/passport_images', $image_name)) {
                    $pet->passport_image = $image_name;
                }
                if ($request->hasFile('english_image')) {
                    // passport images store
                    $image = $request->file('english_image');
                    $image_extension = $image->getClientOriginalExtension();
                    $fio = $nomiga . '_english.' . $image_extension;
                    // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                    $image_name = str_replace(" ", '_', $fio);
                    if ($image->move('users/documents/english_images', $image_name)) {
                        $pet->english_image = $image_name;
                    }
                }
                if ($request->hasFile('image_recommendation')) {
                    // passport images store
                    $image = $request->file('image_recommendation');
                    $image_extension = $image->getClientOriginalExtension();
                    $fio = $nomiga . '_recommendation.' . $image_extension;
                    $image_name = str_replace(" ", '_', $fio);
                    if ($image->move('users/documents/recommendation_images', $image_name)) {
                        $pet->image_recommendation = $image_name;
                    }
                }
                if ($request->hasFile('workbook')) {
                    // passport images store
                    $image = $request->file('workbook');
                    $image_extension = $image->getClientOriginalExtension();
                    $fio = $nomiga . '_workbook.' . $image_extension;
                    $image_name = str_replace(" ", '_', $fio);
                    if ($image->move('users/documents/workbook', $image_name)) {
                        $pet->workbook = $image_name;
                    }
                }
                if ($request->hasFile('passport_copy_translate')) {
                    // passport images store
                    $image = $request->file('passport_copy_translate');
                    $image_extension = $image->getClientOriginalExtension();
                    $fio = $nomiga . '_passport_copy_translate.' . $image_extension;
                    $image_name = str_replace(" ", '_', $fio);
                    if ($image->move('users/documents/passport_images', $image_name)) {
                        $pet->passport_copy_translate = $image_name;
                    }
                }
                if ($request->hasFile('birth_certificate_copy')) {
                    // passport images store
                    $image = $request->file('birth_certificate_copy');
                    $image_extension = $image->getClientOriginalExtension();
                    $fio = $nomiga . '_birth_certificate_copy.' . $image_extension;
                    $image_name = str_replace(" ", '_', $fio);
                    if ($image->move('users/documents/passport_images', $image_name)) {
                        $pet->birth_certificate_copy = $image_name;
                    }
                }
                if ($request->hasFile('birth_certificate_copy_translate')) {
                    // passport images store
                    $image = $request->file('birth_certificate_copy_translate');
                    $image_extension = $image->getClientOriginalExtension();
                    $fio = $nomiga . '_birth_certificate_copy_translate.' . $image_extension;
                    $image_name = str_replace(" ", '_', $fio);
                    if ($image->move('users/documents/passport_images', $image_name)) {
                        $pet->birth_certificate_copy_translate = $image_name;
                    }
                }
                if ($request->hasFile('edu_document_copy_translate')) {
                    // passport images store
                    $image = $request->file('edu_document_copy_translate');
                    $image_extension = $image->getClientOriginalExtension();
                    $fio = $nomiga . '_edu_document_copy_translate.' . $image_extension;
                    $image_name = str_replace(" ", '_', $fio);
                    if ($image->move('users/documents/diplom_images', $image_name)) {
                        $pet->edu_document_copy_translate = $image_name;
                    }
                }
                if ($request->hasFile('med_form_copy_086')) {
                    // passport images store
                    $image = $request->file('med_form_copy_086');
                    $image_extension = $image->getClientOriginalExtension();
                    $fio = $nomiga . '_med_form_copy_086.' . $image_extension;
                    $image_name = str_replace(" ", '_', $fio);
                    if ($image->move('users/documents/med_forms', $image_name)) {
                        $pet->med_form_copy_086 = $image_name;
                    }
                }
                if ($request->hasFile('med_form_copy_086_translate')) {
                    // passport images store
                    $image = $request->file('med_form_copy_086_translate');
                    $image_extension = $image->getClientOriginalExtension();
                    $fio = $nomiga . '_med_form_copy_086_translate.' . $image_extension;
                    $image_name = str_replace(" ", '_', $fio);
                    if ($image->move('users/documents/med_forms', $image_name)) {
                        $pet->med_form_copy_086_translate = $image_name;
                    }
                }
                if ($request->hasFile('vich_copy')) {
                    // passport images store
                    $image = $request->file('vich_copy');
                    $image_extension = $image->getClientOriginalExtension();
                    $fio = $nomiga . '_vich_copy.' . $image_extension;
                    $image_name = str_replace(" ", '_', $fio);
                    if ($image->move('users/documents/med_forms', $image_name)) {
                        $pet->vich_copy = $image_name;
                    }
                }
                if ($request->hasFile('vich_copy_translate')) {
                    // passport images store
                    $image = $request->file('vich_copy_translate');
                    $image_extension = $image->getClientOriginalExtension();
                    $fio = $nomiga . '_vich_copy_translate.' . $image_extension;
                    $image_name = str_replace(" ", '_', $fio);
                    if ($image->move('users/documents/med_forms', $image_name)) {
                        $pet->vich_copy_translate = $image_name;
                    }
                }
                if ($request->hasFile('med_form_copy_063')) {
                    // passport images store
                    $image = $request->file('med_form_copy_063');
                    $image_extension = $image->getClientOriginalExtension();
                    $fio = $nomiga . '_med_form_copy_063.' . $image_extension;
                    $image_name = str_replace(" ", '_', $fio);
                    if ($image->move('users/documents/med_forms', $image_name)) {
                        $pet->med_form_copy_063 = $image_name;
                    }
                }
                if ($request->hasFile('med_form_copy_063_translate')) {
                    // passport images store
                    $image = $request->file('med_form_copy_063_translate');
                    $image_extension = $image->getClientOriginalExtension();
                    $fio = $nomiga . '_med_form_copy_063_translate.' . $image_extension;
                    $image_name = str_replace(" ", '_', $fio);
                    if ($image->move('users/documents/med_forms', $image_name)) {
                        $pet->med_form_copy_063_translate = $image_name;
                    }
                }
                $pet->save();
                return redirect(route('petition.status'));


            } else {
                return redirect(route('check_status'));
            }
        }

        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Petition $petition
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {

        $petition = Petition::with('high_school')->find($id);
        $edits = Editing::where('petition_id', $petition->id)->get();
        $i = 0;
        $a = [];
        foreach ($edits as $k) {
            $a[$i] = $k->column;
            $i++;
        }
        if ($petition->user_id == Auth::user()->id && Auth::user()->role == 0) {
            return view('user.pages.petition.show', [
                'petition' => $petition,
                'edits' => $a

            ]);
        } else {
            return redirect(route('home'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Petition $petition
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $p = Petition::find($id);
        if ($p->user_id == Auth::user()->id && Auth::user()->role == 0) {

            $country = Country::where('status', 1)->get();
            $regions = Region::where('country_id', $p->country_id)->where('status', 1)->get();
            $areas = Area::where('region_id', $p->region_id)->where('status', 1)->get();
            $typeschool = Typeschool::all();
            $endegree = Endegree::all();
            $edp = FacultyTypeEdu::where('faculty_id', $p->faculty_id)->pluck('type_education_id');
            $edutypes = Edutype::whereIn('id', $edp)->get();
            $edl = FacultyTypeLang::where('faculty_id', $p->faculty_id)->pluck('type_language_id');
            $high_schools = HighSchool::where('status', 1)->get();
            $faculties = Faculty::where('status', 1)->where('high_school_id', $p->high_school_id)->get();


            $languagetype = Languagetype::whereIn('id', $edl)->get();
            $disability = Disability::all();
            $edits = Editing::where('petition_id', $id)->get();
            $i = 0;
            $a = [];

            foreach ($edits as $k) {
                $a[$i] = $k->column;
                $i++;
            }
            if ($p->status != 2) {
                return view('user.pages.petition.edit', [
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
                    'high_schools' => $high_schools
                ]);
            } else {
                return redirect(url()->previous());
            }
        } else {
            return redirect(route('check_status'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Petition $petition
     * @return \Illuminate\Http\Response
     */
    public function array_except($array, $keys)
    {
        foreach ($keys as $key) {
            unset($array[$key]);
        }
        return $array;
    }

    function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 9; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function update(Request $request, $id)
    {
        $peti = Petition::find($id);
        $facu = Faculty::find($peti->faculty_id);
        if ($facu->status == 1) {
            $role = [
                'last_name' => ['required', 'required', 'min:2', 'max:255'],

                'first_name' => ['required', 'required', 'min:2', 'max:255'],

                'middle_name' => ['required', 'min:2', 'max:255'],
                'birth_date' => ['after:1885-07-01|before:2005-07-01'],
                'image' => ['image'],
                'country_id' => ['required', 'regex: /^[0-9]*$/'],
                'region_id' => ['required', 'regex: /^[0-9]*$/'],
                'area_id' => ['required', 'regex: /^[0-9]*$/'],
                'address' => ['required', 'min:2', 'max:255'],
                'citizenship' => ['required', 'min:2', 'max:255'],
                'nationality' => ['required', 'min:2', 'max:255'],
                'passport_seria' => ['required', 'min:2', 'max:50'],
                'passport_image' => ['required', 'max:4000'],
                'school' => ['required', 'min:2', 'max:255'],
                'diplom_number' => ['required', 'min:2', 'max:255'],
                'diplom_image' => ['required', 'max:4000'],
                'image' => ['required', 'image', 'max:4000'],
                'faculty_id' => ['required', 'regex: /^[0-9]*$/'],
                'type_education_id' => ['required', 'regex: /^[0-9]*$/'],
                'type_language_id' => ['required', 'regex: /^[0-9]*$/'],
                'disability_status_id' => ['required', 'regex: /^[0-9]*$/'],
                'english_image' => ['max:4000'],
            ];

            $es = Editing::where('petition_id', $id)->pluck('column');
            $es2 = Editing::where('petition_id', $id)->get();
            $re = [];
            $es_arr = [];
            $lal = 0;
            foreach ($es2 as $k) {
                $es_arr[$lal] = $k->column;
                $lal++;
            }
            // return $es_arr;
            $i = 0;
            foreach ($es as $key => $value) {
                if (isset($role[$value])) {
                    $re[$value] = $role[$value];
                }

            }
            // return $re;
            if (Auth::check() && Auth::user()->role == 0) {

                $pat = new Petition();
                // return $pat->rules_update;
                $validator = Validator::make($request->all(), $re);
                if ($validator->fails()) {
//                return $request->all();
//                     return $validator->errors();
                    return back()->withErrors($validator)->withInput();
                } else {
                    if (Auth::check()) {
                        $user = Auth::user();
                        $pet = Petition::find($id);
                        $pet->status = 0;
                        if ($request->last_name) $pet->last_name = $request->last_name;
                        if ($request->first_name) $pet->first_name = $request->first_name;
                        if ($request->middle_name) $pet->middle_name = $request->middle_name;
                        if ($request->gender) $pet->gender = $request->gender;
                        if ($request->birth_date) $pet->birth_date = date('Y-m-d', strtotime($request->birth_date));
                        if ($request->country_id) $pet->country_id = $request->country_id;
                        if ($request->region_id) $pet->region_id = $request->region_id;
                        if ($request->area_id) $pet->area_id = $request->area_id;
                        if ($request->address) $pet->address = $request->address;
                        if ($request->citizenship) $pet->citizenship = $request->citizenship;
                        if ($request->nationality) $pet->nationality = $request->nationality;
                        if ($request->passport_seria) $pet->passport_seria = str_replace(' ', '', $request->passport_seria);
                        if ($request->passport_given_place) $pet->passport_given_place = $request->passport_given_place;
                        if ($request->home_phone) $pet->home_phone = $request->home_phone;
                        if ($request->mobile_phone) $pet->mobile_phone = $request->mobile_phone;
                        if ($request->father_phone) $pet->father_phone = $request->father_phone;
                        if ($request->mother_phone) $pet->mother_phone = $request->mother_phone;
                        if ($request->school) $pet->school = $request->school;
                        if ($request->type_school) $pet->type_school = $request->type_school;
                        if ($request->graduation_date) $pet->graduation_date = $request->graduation_date;
                        if ($request->diplom_number) $pet->diplom_number = $request->diplom_number;
                        if ($request->english_degree) $pet->english_degree = $request->english_degree;

                        if ($request->overall_score_english) $pet->overall_score_english = $request->overall_score_english;
                        if ($request->ilts_number) $pet->ilts_number = $request->ilts_number;
                        if (in_array('overall_score_english', $es_arr)) {
                            if (!$request->overall_score_english) {
                                $pet->overall_score_english = '';
                            }
                        }
                        if (in_array('ilts_number', $es_arr)) {
                            if (!$request->ilts_number) {
                                $pet->ilts_number = '';
                            }
                        }
                        if ($request->faculty_id) $pet->faculty_id = $request->faculty_id;
                        if ($request->high_school_id) $pet->high_school_id = $request->high_school_id;
                        if ($request->type_education_id) $pet->type_education_id = $request->type_education_id;
                        if ($request->type_language_id) $pet->type_language_id = $request->type_language_id;
                        if ($request->disability_status_id) $pet->disability_status_id = $request->disability_status_id;
                        if ($request->disability_description) $pet->disability_description = $request->disability_description;
                        //images store
                        $nomiga = $this->randomPassword() . '_' . $pet->passport_seria;
                        if ($request->hasFile('image')) {
                            $fil_p = public_path('users/documents/image') . '/' . $pet->image;
                            //     if (file_exists($fil_p)) {
                            //         unlink($fil_p);
                            //         $image = $request->file('image');
                            //         $image_extension = $image->getClientOriginalExtension();
                            //         // $fio = $request->last_name.'_'.$request->first_name.'_'.$nomiga;
                            //         $fio = $request->passport_seria.'_'.$nomiga.'.'.$image_extension;
                            //         // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            //         $image_name = str_replace(" ", '_', $fio);
                            //         if ($image->move('users/documents/image' , $image_name)) {
                            //             $pet->image = $image_name;
                            //         }

                            // }
                            // else{
                            $image = $request->file('image');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/image', $image_name)) {
                                $pet->image = $image_name;
                                // }


                            }
                        }


                        // diplom images store
                        if ($request->hasFile('diplom_image')) {
                            $fil_p = public_path('users/documents/diplom_images') . '/' . $pet->diplom_image;
                            // if (file_exists($fil_p)) {
                            //         if (unlink($fil_p)) {
                            //           $image = $request->file('diplom_image');
                            //            $image_extension = $image->getClientOriginalExtension();
                            //            $fio = $request->passport_seria.'_'.$nomiga.'_diplom.'.$image_extension;
                            //            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            //            $image_name = str_replace(" ", '_', $fio);
                            //            if ($image->move('users/documents/diplom_images' , $image_name)) {
                            //                $pet->diplom_image = $image_name;
                            //            }
                            //        }
                            //     }
                            //     else{
                            $image = $request->file('diplom_image');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_diplom.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/diplom_images', $image_name)) {
                                $pet->diplom_image = $image_name;
                            }


                            // }
                        }
                        if ($request->hasFile('diplom_image_app')) {
                            $fil_p = public_path('users/documents/diplom_images') . '/' . $pet->diplom_image_app;
                            // if (file_exists($fil_p)) {
                            //         if (unlink($fil_p)) {
                            //           $image = $request->file('diplom_image');
                            //            $image_extension = $image->getClientOriginalExtension();
                            //            $fio = $request->passport_seria.'_'.$nomiga.'_diplom.'.$image_extension;
                            //            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            //            $image_name = str_replace(" ", '_', $fio);
                            //            if ($image->move('users/documents/diplom_images' , $image_name)) {
                            //                $pet->diplom_image = $image_name;
                            //            }
                            //        }
                            //     }
                            //     else{
                            $image = $request->file('diplom_image_app');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_diplom_app.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/diplom_images', $image_name)) {
                                $pet->diplom_image_app = $image_name;
                            }


                            // }
                        }
                        // passport images store
                        if ($request->hasFile('passport_image')) {
                            $fil_p = public_path('users/documents/passport_images') . '/' . $pet->passport_image;
                            // if (file_exists($fil_p)) {
                            //     if (unlink($fil_p)) {
                            //        $image = $request->file('passport_image');
                            //         $image_extension = $image->getClientOriginalExtension();
                            //         $fio = $request->passport_seria.'_'.$nomiga.'_passport.'.$image_extension;
                            //         // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            //         $image_name = str_replace(" ", '_', $fio);
                            //         if ($image->move('users/documents/passport_images' , $image_name)) {
                            //             $pet->passport_image = $image_name;
                            //         }
                            //     }
                            // }
                            // else{
                            $image = $request->file('passport_image');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_passport.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/passport_images', $image_name)) {
                                $pet->passport_image = $image_name;
                            }
                            // }


                        }
                        if ($request->hasFile('english_image')) {

                            $fil_p = public_path('users/documents/english_images') . '/' . $pet->english_image;
                            // if (file_exists($fil_p)) {
                            //   if (unlink($fil_p)) {
                            //      $image = $request->file('english_image');
                            //       $image_extension = $image->getClientOriginalExtension();
                            //       $fio = $request->passport_seria.'_'.$nomiga.'_english.'.$image_extension;
                            //       // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            //       $image_name = str_replace(" ", '_', $image_name);
                            //       if ($image->move('users/documents/english_images' , $fio)) {
                            //           $pet->english_image = $image_name;
                            //       }
                            //   }
                            // }
                            // else{
                            $image = $request->file('english_image');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_english.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/english_images', $image_name)) {
                                $pet->english_image = $image_name;
                            }
                            // }


                        } else {
                            if (in_array('english_image', $es_arr)) {
                                // $fil_p = public_path('users/documents/english_images').'/'.$pet->english_image;
                                // if (file_exists($fil_p)) {
                                //     unlink($fil_p);
                                // }
                                // return "yoq";
                                $pet->english_image = '';

                            }
                            // return $es_arr;
                            // // return "yoq";

                        }
                        if ($request->hasFile('image_recommendation')) {
                            $fil_p = public_path('users/documents/recommendation_images') . '/' . $pet->image_recommendation;

                            $image = $request->file('image_recommendation');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_recommendation.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/recommendation_images', $image_name)) {
                                $pet->image_recommendation = $image_name;
                            }


                        } else {
                            if (in_array('recommendation', $es_arr)) {
                                $pet->image_recommendation = '';
                            }

                        }
                        if ($request->hasFile('workbook')) {
                            $fil_p = public_path('users/documents/workbook') . '/' . $pet->workbook;

                            $image = $request->file('workbook');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_workbook.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/workbook', $image_name)) {
                                $pet->workbook = $image_name;
                            }


                        } else {
                            if (in_array('workbook', $es_arr)) {
                                $pet->workbook = '';
                            }

                        }
                        if ($request->hasFile('passport_copy_translate')) {
                            $fil_p = public_path('users/documents/passport_images') . '/' . $pet->passport_copy_translate;
                            $image = $request->file('passport_copy_translate');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_passport_copy_translate.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/passport_images', $image_name)) {
                                $pet->passport_copy_translate = $image_name;
                            }
                        } else {
                            if (in_array('passport_copy_translate', $es_arr)) {
                                $pet->passport_copy_translate = '';
                            }
                        }
                        if ($request->hasFile('birth_certificate_copy')) {
                            $fil_p = public_path('users/documents/passport_images') . '/' . $pet->birth_certificate_copy;
                            $image = $request->file('birth_certificate_copy');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_birth_certificate_copy.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/passport_images', $image_name)) {
                                $pet->birth_certificate_copy = $image_name;
                            }
                        } else {
                            if (in_array('birth_certificate_copy', $es_arr)) {
                                $pet->birth_certificate_copy = '';
                            }
                        }
                        if ($request->hasFile('birth_certificate_copy_translate')) {
                            $fil_p = public_path('users/documents/passport_images') . '/' . $pet->birth_certificate_copy_translate;
                            $image = $request->file('birth_certificate_copy_translate');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_birth_certificate_copy_translate.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/passport_images', $image_name)) {
                                $pet->birth_certificate_copy_translate = $image_name;
                            }
                        } else {
                            if (in_array('birth_certificate_copy_translate', $es_arr)) {
                                $pet->birth_certificate_copy_translate = '';
                            }
                        }
                        if ($request->hasFile('edu_document_copy_translate')) {
                            $fil_p = public_path('users/documents/diplom_images') . '/' . $pet->edu_document_copy_translate;
                            $image = $request->file('edu_document_copy_translate');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_edu_document_copy_translate.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/diplom_images', $image_name)) {
                                $pet->edu_document_copy_translate = $image_name;
                            }
                        } else {
                            if (in_array('edu_document_copy_translate', $es_arr)) {
                                $pet->edu_document_copy_translate = '';
                            }
                        }
                        if ($request->hasFile('med_form_copy_086')) {
                            $fil_p = public_path('users/documents/med_forms') . '/' . $pet->med_form_copy_086;
                            $image = $request->file('med_form_copy_086');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_med_form_copy_086.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/med_forms', $image_name)) {
                                $pet->med_form_copy_086 = $image_name;
                            }
                        } else {
                            if (in_array('med_form_copy_086', $es_arr)) {
                                $pet->med_form_copy_086 = '';
                            }
                        }
                        if ($request->hasFile('med_form_copy_086_translate')) {
                            $fil_p = public_path('users/documents/med_forms') . '/' . $pet->med_form_copy_086_translate;
                            $image = $request->file('med_form_copy_086_translate');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_med_form_copy_086_translate.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/med_forms', $image_name)) {
                                $pet->med_form_copy_086_translate = $image_name;
                            }
                        } else {
                            if (in_array('med_form_copy_086_translate', $es_arr)) {
                                $pet->med_form_copy_086_translate = '';
                            }
                        }
                        if ($request->hasFile('vich_copy')) {
                            $fil_p = public_path('users/documents/med_forms') . '/' . $pet->vich_copy;
                            $image = $request->file('vich_copy');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_vich_copy.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/med_forms', $image_name)) {
                                $pet->vich_copy = $image_name;
                            }
                        } else {
                            if (in_array('vich_copy', $es_arr)) {
                                $pet->vich_copy = '';
                            }
                        }
                        if ($request->hasFile('vich_copy_translate')) {
                            $fil_p = public_path('users/documents/med_forms') . '/' . $pet->vich_copy_translate;
                            $image = $request->file('vich_copy_translate');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_vich_copy_translate.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/med_forms', $image_name)) {
                                $pet->vich_copy_translate = $image_name;
                            }
                        } else {
                            if (in_array('vich_copy_translate', $es_arr)) {
                                $pet->vich_copy_translate = '';
                            }
                        }
                        if ($request->hasFile('med_form_copy_063')) {
                            $fil_p = public_path('users/documents/med_forms') . '/' . $pet->med_form_copy_063;
                            $image = $request->file('med_form_copy_063');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_med_form_copy_063.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/med_forms', $image_name)) {
                                $pet->med_form_copy_063 = $image_name;
                            }
                        } else {
                            if (in_array('med_form_copy_063', $es_arr)) {
                                $pet->med_form_copy_063 = '';
                            }
                        }
                        if ($request->hasFile('med_form_copy_063_translate')) {
                            $fil_p = public_path('users/documents/med_forms') . '/' . $pet->med_form_copy_063_translate;
                            $image = $request->file('med_form_copy_063_translate');
                            $image_extension = $image->getClientOriginalExtension();
                            $fio = $request->passport_seria . '_' . $nomiga . '_med_form_copy_063_translate.' . $image_extension;
                            // $image_name = preg_replace("/[^A-Za-z0-9_]/", '', $fio).'.'.$image_extension;
                            $image_name = str_replace(" ", '_', $fio);
                            if ($image->move('users/documents/med_forms', $image_name)) {
                                $pet->med_form_copy_063_translate = $image_name;
                            }
                        } else {
                            if (in_array('med_form_copy_063_translate', $es_arr)) {
                                $pet->med_form_copy_063_translate = '';
                            }
                        }
                        $pet->update();
                        // $edits = Editing::where('petition_id' , $id)->get();
                        // foreach ($edits as $k) {
                        //     $k->delete();
                        // }
                        return redirect(route('petition.status'));


                    } else {

                    }
                }

                return $request;

            } else {
                return redirect(route('check_status'));
            }
        } else {
            return redirect(route('petition.status'));
        }
        // return $request;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Petition $petition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petition $petition)
    {
        //
    }


}
