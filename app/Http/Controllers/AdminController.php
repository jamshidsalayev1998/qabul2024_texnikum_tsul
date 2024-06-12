<?php

namespace App\Http\Controllers;

use App\HighSchoolAdmin;
use App\Petition;
use App\Country;
use App\Typeschool;
use App\Endegree;
use App\Faculty;
use App\Edutype;
use App\Disability;
use App\Languagetype;
use App\User;
use App\Comment;
use App\Editing;
use App\Admin;
use App\Region;
use App\Export;
use App\SmsSend;
use App\HighSchool;
use App\Events\ExcelExportEvent;
use App\Mail\StatusApp;
use App\Mail\AppReturned;
use App\Jobs\EndExport;
use Illuminate\Http\Request;
use App\Exports\PetitionsExport;
use App\Exports\PetitionAccExport;
use App\Exports\PetitionReturnExport;
use App\Exports\PetitionWaitExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use PDF;
use Excel;

ini_set('max_execution_time', '300');

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('tekshiruvchi');
    // }

    //for new design
    public function partition($list, $p)
    {
        $listlen = count($list);
        $partlen = floor($listlen / $p);
        $partrem = $listlen % $p;
        $partition = array();
        $mark = 0;
        for ($px = 0; $px < $p; $px++) {
            $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
            $partition[$px] = array_slice($list, $mark, $incr);
            $mark += $incr;
        }
        return $partition;
    }

    public function send_sms_ajax(Request $request)
    {
        $faks = Faculty::where('status', 1)->pluck('id');
        if ($request->who == 3) {
            $petitions = Petition::whereIn('faculty_id', $faks)->pluck('user_id');
        }
        if ($request->who == 2) {
            $petitions = Petition::whereIn('faculty_id', $faks)->where('status', 2)->pluck('user_id');
        }
        if ($request->who == 1) {
            $petitions = Petition::whereIn('faculty_id', $faks)->where('status', 1)->pluck('user_id');
        }
        // $users = User::where('role' , 3)->orWhere('email' , '+998994571669')->orWhere('email' , '+998919279709')->pluck('email');
        // return $users;
        $users = User::whereIn('id', $petitions)->pluck('email')->toArray();
        // $users = User::where('email' , '+998994571669')->pluck('email');
        $answer = [];
        $aa = 0;
        $ee = 0;
        $err = [];
        $ob = 0;
        $ketmagan = [];
        $kg = 0;
        $misol = '';
        $id = 100000000;
        // return $users;
        // return (array) $users;
        // $users = ['+998994571669' ];
        // return $users;
        $chunk_user2 = $this->partition($users, 8);
        $chunk_user3 = $chunk_user2[$request->part];
        // return json_encode($chunk_user3);

        $chunk_user = array_chunk($chunk_user3, 100);
        // return $chunk_user;

        foreach ($chunk_user as $k) {
            $rr = [];
            $i = 0;
            foreach ($k as $key) {
                $phone = str_replace('-', '', $key);
                $phone = str_replace(' ', '', $phone);
                $phone = str_replace(')', '', $phone);
                $phone = str_replace('(', '', $phone);
                $phone_send = str_replace('+', '', $phone);
                $rr[$i] = "{ \"recipient\": \"$phone_send\", \"message-id\": \"$id$i\", \"sms\": { \"originator\": \"3700\", \"content\": { \"text\": \"$request->sms_text\" } } }";
                $i++;
            }
            $ff = implode(",", $rr);
            $mess = "{ \"messages\": [ $ff ] }";
            // return $mess;
            $sms_send = new SmsSend();
            $res_array = $sms_send->send_many_sms($mess);
            if ($res_array['response'] == '') {
                $ketmagan[$kg] = count($k);
                $kg++;
            }
            if ($res_array['error']) {
                $err[$ee] = $res_array['error'];
                $ee++;
            }
            if (!$res_array['error']) {
                $ob = $ob + count($k);
            }
            usleep(500000);
            $rr = array();
            $misol = $mess;
            $mess = "";
        }

        $jiji['ketmagan'] = $ketmagan;
        $jiji['error'] = $err;
        $jiji['count'] = $ob;
        return json_encode($jiji);


    }

    public function send_sms(Request $request)
    {
        // ini_set('max_execution_time', 600);
        // set_time_limit(120);
        if ($request->who == 3) {
            $petitions = Petition::pluck('user_id');
        }
        if ($request->who == 2) {
            $petitions = Petition::where('status', 2)->pluck('user_id');
        }
        if ($request->who == 1) {
            $petitions = Petition::where('status', 1)->pluck('user_id');
        }
        // $users = User::where('role' , 3)->orWhere('email' , '+998994571669')->orWhere('email' , '+998919279709')->pluck('email');
        // return $users;
        $users = User::whereIn('id', $petitions)->pluck('email')->toArray();
        // $users = User::where('email' , '+998994571669')->pluck('email');
        $answer = [];
        $ee = 0;
        $err = [];
        $ob = 0;
        $id = 100000000;
        // return $users;
        // return (array) $users;
        // $users = ['+998994571669' , '+998994571669' ,'+998994571669' ,'+998994571669' ,'+998994571669' ,'+998994571669' ,'+998994571669' ,'+998994571669' ];
        // return $users;
        $chunk_user = array_chunk($users, 100);
        // return $chunk_user[1];
        foreach ($chunk_user as $k) {
            $rr = [];
            $i = 0;
            foreach ($k as $key) {
                $phone = str_replace('-', '', $key);
                $phone = str_replace(' ', '', $phone);
                $phone = str_replace(')', '', $phone);
                $phone = str_replace('(', '', $phone);
                $phone_send = str_replace('+', '', $phone);
                $rr[$i] = "{ \"recipient\": \"$phone_send\", \"message-id\": \"$id$i\", \"sms\": { \"originator\": \"3700\", \"content\": { \"text\": \"$request->sms_text\" } } }";
                $i++;
            }
            $ff = implode(",", $rr);
            $mess = "{ \"messages\": [ $ff ] }";
            $username = 'yodju';
            $password = 'oeTT8C';
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            // CURLOPT_URL => "http://91.204.239.44/broker-api/send",
            // CURLOPT_RETURNTRANSFER => true,
            // CURLOPT_ENCODING => "",
            // CURLOPT_MAXREDIRS => 10,
            // CURLOPT_TIMEOUT => 30,
            // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            // CURLOPT_CUSTOMREQUEST => "POST",
            // CURLOPT_POSTFIELDS => $mess,
            // CURLOPT_HTTPHEADER => array(
            //         "Authorization: Basic ".base64_encode("$username:$password"),
            //         "Cache-Control: no-cache",
            //         "Content-Type: application/json",
            //     ),
            // ));
            // $response = curl_exec($curl);
            // if (curl_error($curl)) {
            // 	$err[$ee] = curl_error($curl);
            // 	$ee++;
            // }
            // if (!curl_error($curl)) {
            // 	$ob = $ob + count($k);
            // }
            // curl_close($curl);
            $ob = $ob + count($k);
            usleep(300000);
            $rr = array();
            $mess = "";
        }
        // return $ob;

        return view('admin.pages.messages.index', [
            // 'answer' => $answer,
            'errors' => $err,
            'umumiy' => $ob,
            'send' => 1,
        ]);


    }

    public function get_count_reg_atat()
    {
        $region = DB::table('regions as rg')->select([
            'rg.id',
            'rg.name_uz',
            DB::raw('count( DISTINCT pt.id ) as count'),
        ])
            ->leftJoin('petitions as pt', function ($join) {
                $join->on('pt.region_id', 'rg.id');
            })
            ->groupBy('rg.id', 'rg.name_uz')->get();
        $rr = [];
        foreach ($region as $k) {
            $rr[$k->id] = $k->count;
        }
        return json_encode($rr);
    }

    public function statistics()
    {
        $boys = Petition::where('gender', 1)->get()->count();
        $girls = Petition::where('gender', 0)->get()->count();
        // $region = Petition::groupBy('region_id')->get();
        $region = DB::table('regions as rg')->select([
            'rg.id',
            'rg.name_uz',
            DB::raw('count( DISTINCT pt.id ) as count'),
        ])
            ->leftJoin('petitions as pt', function ($join) {
                $join->on('pt.region_id', 'rg.id');
            })
            ->groupBy('rg.id', 'rg.name_uz')->get();

        $current_date = date('Y-m-d h:i:s');
        $old_date = date('Y-m-d h:i:s', strtotime($current_date . '-15 day'));
        $month_acc = Petition::select([
            DB::raw('DATE_FORMAT(created_at, "%d-%m") as month'),
            DB::raw('count(DISTINCT id) as count'),
        ])->where('status', 2)->where('created_at', '>', $old_date)->groupBy('month')->get();
        // return $month_acc;
        $month_return = Petition::select([
            DB::raw('DATE_FORMAT(created_at, "%d-%m") as month'),
            DB::raw('count(DISTINCT id) as count'),
        ])->where('status', 1)->where('created_at', '>', $old_date)->groupBy('month')->get();
        $month_wait = Petition::select([
            DB::raw('DATE_FORMAT(created_at, "%d-%m") as month'),
            DB::raw('count(DISTINCT id) as count'),
        ])->where('status', 0)->where('created_at', '>', $old_date)->groupBy('month')->get();
        // return $month_acc;

        $faculty = DB::table('faculties as fc')->select([
            'fc.id',
            'fc.name_uz',
            'fc.name_ru',
            'fc.name_en',
            // DB::raw('count(DISTINCT pt.id) as girls'),
            // DB::raw('count(DISTINCT ptt.id) as boys'),
            // DB::raw('count(DISTINCT pttt.id) as all')
        ])
            // ->leftJoin('petitions as pt' , function($join){
            //     $join->on('pt.faculty_id' , 'fc.id');
            //     $join->where('pt.gender' , 0);
            // })
            // ->leftJoin('petitions as ptt' , function($join1){
            //     $join1->on('ptt.faculty_id' , 'fc.id');
            //     $join1->where('ptt.gender' , 1);
            // })
            // ->leftJoin('petitions as pttt' , function($join2){
            //     $join2->on('pttt.faculty_id' , 'fc.id');
            //     $join2->where('pttt.status' , 2);
            // })
            ->groupBy('fc.id', 'fc.name_ru', 'fc.name_en', 'fc.name_uz')->get();


        // return $faculty;

        $month_return_ar = $this->getarr($month_return);
        $month_acc_ar = $this->getarr($month_acc);
        $month_wait_ar = $this->getarr($month_wait);
        // return $month_acc_ar;
        // return "lalala";

        // return $region;
        $rr = [];
        foreach ($region as $k) {
            $rr[$k->id] = $k->count;
        }


        return view('admin.pages.petition.statistics', [
            'boys' => $boys,
            'girls' => $girls,
            'faculty' => $faculty,
            'region' => $rr,
            'month_acc' => $month_acc_ar,
            'month_wait' => $month_wait_ar,
            'month_return' => $month_return_ar,
        ]);
    }

    public function statistics_by_high_schools($id)
    {
        if (!HighSchool::find($id)) {
            abort(404);
        }
        $boys = Petition::where('gender', 1)->where('high_school_id', $id)->get()->count();
        $girls = Petition::where('gender', 0)->where('high_school_id', $id)->get()->count();
        // $region = Petition::groupBy('region_id')->get();
        $region = DB::table('regions as rg')->select([
            'rg.id',
            'rg.name_uz',
            DB::raw('count( DISTINCT pt.id ) as count'),
        ])
            ->leftJoin('petitions as pt', function ($join) use ($id) {
                $join->on('pt.region_id', 'rg.id');
                $join->where('pt.high_school_id', $id);
            })
            ->groupBy('rg.id', 'rg.name_uz')->get();

        $current_date = date('Y-m-d h:i:s');
        $old_date = date('Y-m-d h:i:s', strtotime($current_date . '-15 day'));
        $month_acc = Petition::select([
            DB::raw('DATE_FORMAT(created_at, "%d-%m") as month'),
            DB::raw('count(DISTINCT id) as count'),
        ])->where('status', 2)->where('created_at', '>', $old_date)->where('high_school_id', $id)->groupBy('month')->get();
        // return $month_acc;
        $month_return = Petition::select([
            DB::raw('DATE_FORMAT(created_at, "%d-%m") as month'),
            DB::raw('count(DISTINCT id) as count'),
        ])->where('status', 1)->where('created_at', '>', $old_date)->where('high_school_id', $id)->groupBy('month')->get();
        $month_wait = Petition::select([
            DB::raw('DATE_FORMAT(created_at, "%d-%m") as month'),
            DB::raw('count(DISTINCT id) as count'),
        ])->where('status', 0)->where('created_at', '>', $old_date)->where('high_school_id', $id)->groupBy('month')->get();
        // return $month_acc;

        $faculty = DB::table('faculties as fc')->select([
            'fc.id',
            'fc.name_uz',
            'fc.name_ru',
            'fc.name_en',
            // DB::raw('count(DISTINCT pt.id) as girls'),
            // DB::raw('count(DISTINCT ptt.id) as boys'),
            // DB::raw('count(DISTINCT pttt.id) as all')
        ])
            // ->leftJoin('petitions as pt' , function($join){
            //     $join->on('pt.faculty_id' , 'fc.id');
            //     $join->where('pt.gender' , 0);
            // })
            // ->leftJoin('petitions as ptt' , function($join1){
            //     $join1->on('ptt.faculty_id' , 'fc.id');
            //     $join1->where('ptt.gender' , 1);
            // })
            // ->leftJoin('petitions as pttt' , function($join2){
            //     $join2->on('pttt.faculty_id' , 'fc.id');
            //     $join2->where('pttt.status' , 2);
            // })
            ->groupBy('fc.id', 'fc.name_ru', 'fc.name_en', 'fc.name_uz')->where('fc.high_school_id', $id)->get();


        // return $faculty;

        $month_return_ar = $this->getarr($month_return);
        $month_acc_ar = $this->getarr($month_acc);
        $month_wait_ar = $this->getarr($month_wait);
        // return $month_acc_ar;
        // return "lalala";

        // return $region;
        $rr = [];
        foreach ($region as $k) {
            $rr[$k->id] = $k->count;
        }


        return view('admin.pages.petition.statistics', [
            'boys' => $boys,
            'girls' => $girls,
            'faculty' => $faculty,
            'region' => $rr,
            'month_acc' => $month_acc_ar,
            'month_wait' => $month_wait_ar,
            'month_return' => $month_return_ar,
            'high_school_id' => $id
        ]);
    }

    public function getarr($r)
    {
        $current_date = date('Y-m-d h:i:s');
        $old_date = date('Y-m-d h:i:s', strtotime($current_date . '-15 day'));
        $kunlar = [];
        for ($i = 0; $i < 15; $i++) {
            $kunlar[$i] = date('d-m', strtotime($current_date . '-' . $i . ' day'));
        }
        // return $kunlar;
        // return $old_date;
        $res = [];
        $g = [];
        foreach ($r as $k) {
            $g[$k->month] = $k->count;
        }
        foreach ($kunlar as $key => $value) {
            if (array_key_exists($value, $g)) {
                $res[$value] = $g[$value];
            } else {
                $res[$value] = 0;
            }

        }
        return $res;
    }


    public function export_all_excel()
    {


        $n_e = new Export();
        $n_e->admin_id = Auth::user()->id;
        $n_e->save();
        $name = 'all_applications_' . $n_e->id . '_' . date('Y-m-d') . '.xlsx';
        $n_e->name_file = $name;
        $n_e->update();
        // (new PetitionsExport)->queue($name)->chain([
        //     new EndExport($name),
        // ]);
        // while (!Storage::exists($name)) {
        //     sleep(1);
        // }
        // return $name;

        return Excel::download(new PetitionsExport, $name);
    }

    public function export_acc_excel()
    {
        $n_e = new Export();
        $n_e->admin_id = Auth::user()->id;
        $n_e->save();
        $name = 'acc_applications_' . $n_e->id . '_' . date('Y-m-d') . '.xlsx';
        $n_e->name_file = $name;
        $n_e->update();
//        $petitions = Petition::with([
//            'country:id,name_uz,name_ru,name_en' ,
//            'region:id,name_uz,name_ru,name_en',
//            'area:id,name_uz,name_ru,name_en',
//            'type_education:id,name_uz,name_ru,name_en',
//            'type_language:id,name_uz,name_ru,name_en',
//            'type_school:id,name_uz,name_ru,name_en',
//            'english_degree:id,name_uz,name_ru,name_en',
//            'faculty:id,name_uz,name_ru,name_en',
//            'disability_status:id,name_uz,name_ru,name_en',
//            'user',
//        ])
//        ->where('status', 2)->where(function ($query) {
//            $user = Auth::user();
//            if ($user->role == 4) {
//                $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
//                $query->where('high_school_id', $admin->high_school_id);
//            }
//        })->get();
//        return $petitions;
        return Excel::download(new PetitionAccExport, $name);

    }

    public function export_return_excel()
    {
        // return Excel::download(new PetitionReturnExport , 'All_applications.xlsx');
        $n_e = new Export();
        $n_e->admin_id = Auth::user()->id;
        $n_e->save();
        $name = 'return_applications_' . $n_e->id . '_' . date('Y-m-d') . '.xlsx';
        $n_e->name_file = $name;
        $n_e->update();
        // (new PetitionReturnExport)->queue($name)->chain([
        //     new EndExport($name),
        // ]);
        // while (!Storage::exists($name)) {
        //     sleep(1);
        // }
        // return $name;
        return Excel::download(new PetitionReturnExport, $name);

    }

    public function export_wait_excel()
    {
        // return Excel::download(new PetitionWaitExport , 'All_applications.xlsx');
        $n_e = new Export();
        $n_e->admin_id = Auth::user()->id;
        $n_e->save();
        $name = 'wait_applications_' . $n_e->id . '_' . date('Y-m-d') . '.xlsx';
        $n_e->name_file = $name;
        $n_e->update();
        // (new PetitionWaitExport)->queue($name)->chain([
        //     new EndExport($name),
        // ]);
        // while (!Storage::exists($name)) {
        //     sleep(1);
        // }
        // return $name;
        return Excel::download(new PetitionWaitExport, $name);

    }

    public function search_all($data)
    {
        $petitions = DB::table('petitions as pt')->select([
            'pt.id',
            'pt.first_name',
            'pt.last_name',
            'pt.middle_name',
            'pt.created_at',
            'fc.name_uz',
            'fc.name_ru',
            'fc.name_en',
            'us.email',
            'hg.name_uz as hg_name_uz',

        ])
            ->leftJoin('faculties as fc', function ($join) {
                $join->on('pt.faculty_id', '=', 'fc.id');
            })
            ->leftJoin('high_schools as hg', function ($join) {
                $join->on('pt.high_school_id', '=', 'hg.id');
            })
            ->leftJoin('users as us', function ($join1) {
                $join1->on('pt.user_id', '=', 'us.id');
            })
            ->groupBy('pt.id', 'pt.first_name', 'pt.last_name', 'pt.middle_name', 'pt.created_at', 'fc.name_uz', 'fc.name_ru', 'fc.name_en', 'us.email')
            ->orderBy('id', 'DESC')
            ->where(function ($queryy) use ($data) {
                $queryy->where('pt.first_name', 'like', '%' . $data . '%');
                $queryy->orWhere('pt.last_name', 'like', '%' . $data . '%');
                $queryy->orWhere('pt.middle_name', 'like', '%' . $data . '%');
                $queryy->orWhere('pt.created_at', 'like', '%' . $data . '%');
                $queryy->orWhere('fc.name_uz', 'like', '%' . $data . '%');
                $queryy->orWhere('fc.name_ru', 'like', '%' . $data . '%');
                $queryy->orWhere('fc.name_en', 'like', '%' . $data . '%');
                $queryy->orWhere('us.email', 'like', '%' . $data . '%');
                $queryy->orWhere(DB::raw('CONCAT(pt.last_name," ",pt.first_name," ",pt.middle_name)'), 'like', '%' . $data . '%');
                $queryy->orWhere(DB::raw('CONCAT(pt.last_name," ",pt.middle_name," ",pt.first_name)'), 'LIKE', '%' . $data . '%');
                $queryy->orWhere(DB::raw('CONCAT(pt.first_name," ",pt.middle_name," ",pt.last_name)'), 'LIKE', '%' . $data . '%');
                $queryy->orWhere(DB::raw('CONCAT(pt.first_name," ",pt.last_name," ",pt.middle_name)'), 'LIKE', '%' . $data . '%');
                $queryy->orWhere(DB::raw('CONCAT(pt.middle_name," ",pt.last_name," ",pt.first_name)'), 'LIKE', '%' . $data . '%');
                $queryy->orWhere(DB::raw('CONCAT(pt.middle_name," ",pt.first_name," ",pt.last_name)'), 'LIKE', '%' . $data . '%');
            })
            ->where(function ($query) {
                $user = Auth::user();
                if ($user->role == 4) {
                    $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                    $query->where('pt.high_school_id', $admin->high_school_id);
                }
            })
            ->paginate('10');
        return json_encode($petitions);
    }

    public function search_wait($data)
    {
        $petitions = DB::table('petitions as pt')->select([
            'pt.id',
            'pt.first_name',
            'pt.last_name',
            'pt.middle_name',
            'pt.created_at',
            'fc.name_uz',
            'fc.name_ru',
            'fc.name_en',
            'us.email',
            'hg.name_uz as hg_name_uz',

        ])
            ->leftJoin('faculties as fc', function ($join) {
                $join->on('pt.faculty_id', '=', 'fc.id');
            })
            ->leftJoin('high_schools as hg', function ($join) {
                $join->on('pt.high_school_id', '=', 'hg.id');
            })
            ->leftJoin('users as us', function ($join1) {
                $join1->on('pt.user_id', '=', 'us.id');
            })
            ->groupBy('pt.id', 'pt.first_name', 'pt.last_name', 'pt.middle_name', 'pt.created_at', 'fc.name_uz', 'fc.name_ru', 'fc.name_en', 'us.email')
            ->orderBy('id', 'DESC')
            ->where(function ($query) use ($data) {
                $query->where('pt.first_name', 'like', '%' . $data . '%');
                $query->orWhere('pt.last_name', 'LIKE', '%' . $data . '%');
                $query->orWhere('pt.middle_name', 'LIKE', '%' . $data . '%');
                $query->orWhere('pt.created_at', 'LIKE', '%' . $data . '%');
                $query->orWhere('fc.name_uz', 'LIKE', '%' . $data . '%');
                $query->orWhere('fc.name_ru', 'LIKE', '%' . $data . '%');
                $query->orWhere('fc.name_en', 'LIKE', '%' . $data . '%');
                $query->orWhere('us.email', 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.last_name," ",pt.first_name," ",pt.middle_name)'), 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.last_name," ",pt.middle_name," ",pt.first_name)'), 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.first_name," ",pt.middle_name," ",pt.last_name)'), 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.first_name," ",pt.last_name," ",pt.middle_name)'), 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.middle_name," ",pt.last_name," ",pt.first_name)'), 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.middle_name," ",pt.first_name," ",pt.last_name)'), 'LIKE', '%' . $data . '%');
            })
            ->where('pt.status', 0)
            ->where(function ($query) {
                $user = Auth::user();
                if ($user->role == 4) {
                    $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                    $query->where('pt.high_school_id', $admin->high_school_id);
                }
            })
            ->paginate('10');
        return json_encode($petitions);
    }

    public function search_return($data)
    {
        $petitions = DB::table('petitions as pt')->select([
            'pt.id',
            'pt.first_name',
            'pt.last_name',
            'pt.middle_name',
            'pt.created_at',
            'fc.name_uz',
            'fc.name_ru',
            'fc.name_en',
            'us.email',
            'hg.name_uz as hg_name_uz',

        ])
            ->leftJoin('faculties as fc', function ($join) {
                $join->on('pt.faculty_id', '=', 'fc.id');
            })
            ->leftJoin('high_schools as hg', function ($join) {
                $join->on('pt.high_school_id', '=', 'hg.id');
            })
            ->leftJoin('users as us', function ($join1) {
                $join1->on('pt.user_id', '=', 'us.id');
            })
            ->groupBy('pt.id', 'pt.first_name', 'pt.last_name', 'pt.middle_name', 'pt.created_at', 'fc.name_uz', 'fc.name_ru', 'fc.name_en', 'us.email')
            ->orderBy('id', 'DESC')
            ->where(function ($query) use ($data) {
                $query->where('pt.first_name', 'like', '%' . $data . '%');
                $query->orWhere('pt.last_name', 'LIKE', '%' . $data . '%');
                $query->orWhere('pt.middle_name', 'LIKE', '%' . $data . '%');
                $query->orWhere('pt.created_at', 'LIKE', '%' . $data . '%');
                $query->orWhere('fc.name_uz', 'LIKE', '%' . $data . '%');
                $query->orWhere('fc.name_ru', 'LIKE', '%' . $data . '%');
                $query->orWhere('fc.name_en', 'LIKE', '%' . $data . '%');
                $query->orWhere('us.email', 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.last_name," ",pt.first_name," ",pt.middle_name)'), 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.last_name," ",pt.middle_name," ",pt.first_name)'), 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.first_name," ",pt.middle_name," ",pt.last_name)'), 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.first_name," ",pt.last_name," ",pt.middle_name)'), 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.middle_name," ",pt.last_name," ",pt.first_name)'), 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.middle_name," ",pt.first_name," ",pt.last_name)'), 'LIKE', '%' . $data . '%');
            })
            ->where('pt.status', 1)
            ->where(function ($query) {
                $user = Auth::user();
                if ($user->role == 4) {
                    $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                    $query->where('pt.high_school_id', $admin->high_school_id);
                }
            })
            ->paginate('10');
        return json_encode($petitions);
    }

    public function search_acc($data)
    {
        $petitions = DB::table('petitions as pt')->select([
            'pt.id',
            'pt.first_name',
            'pt.last_name',
            'pt.middle_name',
            'pt.created_at',
            'fc.name_uz',
            'fc.name_ru',
            'fc.name_en',
            'us.email',
            'hg.name_uz as hg_name_uz',


        ])
            ->leftJoin('faculties as fc', function ($join) {
                $join->on('pt.faculty_id', '=', 'fc.id');
            })
            ->leftJoin('high_schools as hg', function ($join) {
                $join->on('pt.high_school_id', '=', 'hg.id');
            })
            ->leftJoin('users as us', function ($join1) {
                $join1->on('pt.user_id', '=', 'us.id');
            })
            ->groupBy('pt.id', 'pt.first_name', 'pt.last_name', 'pt.middle_name', 'pt.created_at', 'fc.name_uz', 'fc.name_ru', 'fc.name_en', 'us.email')
            ->orderBy('id', 'DESC')
            ->where(function ($query) use ($data) {
                $query->where('pt.first_name', 'like', '%' . $data . '%');
                $query->orWhere('pt.last_name', 'LIKE', '%' . $data . '%');
                $query->orWhere('pt.middle_name', 'LIKE', '%' . $data . '%');
                $query->orWhere('pt.created_at', 'LIKE', '%' . $data . '%');
                $query->orWhere('fc.name_uz', 'LIKE', '%' . $data . '%');
                $query->orWhere('fc.name_ru', 'LIKE', '%' . $data . '%');
                $query->orWhere('fc.name_en', 'LIKE', '%' . $data . '%');
                $query->orWhere('us.email', 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.last_name," ",pt.first_name," ",pt.middle_name)'), 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.last_name," ",pt.middle_name," ",pt.first_name)'), 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.first_name," ",pt.middle_name," ",pt.last_name)'), 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.first_name," ",pt.last_name," ",pt.middle_name)'), 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.middle_name," ",pt.last_name," ",pt.first_name)'), 'LIKE', '%' . $data . '%');
                $query->orWhere(DB::raw('CONCAT(pt.middle_name," ",pt.first_name," ",pt.last_name)'), 'LIKE', '%' . $data . '%');
            })
            ->where('pt.status', 2)
            ->where(function ($query) {
                $user = Auth::user();
                if ($user->role == 4) {
                    $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                    $query->where('pt.high_school_id', $admin->high_school_id);
                }
            })
            ->paginate('10');
        return json_encode($petitions);
    }

    public function get_all_totable()
    {
        $petitions = DB::table('petitions as pt')->select([
            'pt.id',
            'pt.first_name',
            'pt.last_name',
            'pt.middle_name',
            'pt.created_at',
            'pt.high_school_id',
            'fc.name_uz',
            'fc.name_ru',
            'fc.name_en',
            'us.email',
            'hg.name_uz as hg_name_uz',

        ])
            ->leftJoin('high_schools as hg', function ($join) {
                $join->on('pt.high_school_id', '=', 'hg.id');
            })
            ->leftJoin('faculties as fc', function ($join) {
                $join->on('pt.faculty_id', '=', 'fc.id');
            })
            ->leftJoin('users as us', function ($join1) {
                $join1->on('pt.user_id', '=', 'us.id');
            })
            ->where(function ($query) {
                $user = Auth::user();
                if ($user->role == 4) {
                    $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                    $query->where('pt.high_school_id', $admin->high_school_id);
                }
            })
            ->groupBy('pt.id', 'pt.first_name', 'pt.last_name', 'pt.middle_name', 'pt.created_at', 'fc.name_uz', 'fc.name_ru', 'fc.name_en', 'us.email')->orderBy('id', 'DESC')->paginate('10');
        return json_encode($petitions);
    }

    public function all_totable_page()
    {
        $page = [];
        $y = 0;
        // for ($i=1; $i <= count(Petition::all())/10 ; $i++) {
        //     $page[$y] = $i;
        //     $y++;
        // }
        // return json_encode($page);
        return Petition::count();
    }

    public function get_acc_totable()
    {
        $petitions = DB::table('petitions as pt')->select([
            'pt.id',
            'pt.first_name',
            'pt.last_name',
            'pt.middle_name',
            'pt.created_at',
            'pt.high_school_id',
            'fc.name_uz',
            'fc.name_ru',
            'fc.name_en',
            'us.email',
            'hg.name_uz as hg_name_uz',

        ])
            ->leftJoin('faculties as fc', function ($join) {
                $join->on('pt.faculty_id', '=', 'fc.id');
            })
            ->leftJoin('high_schools as hg', function ($join) {
                $join->on('pt.high_school_id', '=', 'hg.id');
            })
            ->leftJoin('users as us', function ($join1) {
                $join1->on('pt.user_id', '=', 'us.id');
            })
            ->where('pt.status', 2)
            ->where(function ($query) {
                $user = Auth::user();
                if ($user->role == 4) {
                    $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                    $query->where('pt.high_school_id', $admin->high_school_id);
                }
            })
            ->groupBy('pt.id', 'pt.first_name', 'pt.last_name', 'pt.middle_name', 'pt.created_at', 'fc.name_uz', 'fc.name_ru', 'fc.name_en', 'us.email')->orderBy('id', 'DESC')->paginate('10');
        return json_encode($petitions);
    }

    public function get_return_totable()
    {
        $petitions = DB::table('petitions as pt')->select([
            'pt.id',
            'pt.first_name',
            'pt.last_name',
            'pt.middle_name',
            'pt.created_at',
            'pt.high_school_id',
            'fc.name_uz',
            'fc.name_ru',
            'fc.name_en',
            'us.email',
            'hg.name_uz as hg_name_uz',

        ])
            ->leftJoin('faculties as fc', function ($join) {
                $join->on('pt.faculty_id', '=', 'fc.id');
            })
            ->leftJoin('high_schools as hg', function ($join) {
                $join->on('pt.high_school_id', '=', 'hg.id');
            })
            ->leftJoin('users as us', function ($join1) {
                $join1->on('pt.user_id', '=', 'us.id');
            })
            ->where(function ($query) {
                $user = Auth::user();
                if ($user->role == 4) {
                    $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                    $query->where('pt.high_school_id', $admin->high_school_id);
                }
            })
            ->where('pt.status', 1)
            ->groupBy('pt.id', 'pt.first_name', 'pt.last_name', 'pt.middle_name', 'pt.created_at', 'fc.name_uz', 'fc.name_ru', 'fc.name_en', 'us.email')->orderBy('id', 'DESC')->paginate('10');
        return json_encode($petitions);
    }

    public function get_wait_totable()
    {
        $petitions = DB::table('petitions as pt')->select([
            'pt.id',
            'pt.first_name',
            'pt.last_name',
            'pt.middle_name',
            'pt.created_at',
            'pt.high_school_id',
            'fc.name_uz',
            'fc.name_ru',
            'fc.name_en',
            'us.email',
            'hg.name_uz as hg_name_uz',

        ])
            ->leftJoin('faculties as fc', function ($join) {
                $join->on('pt.faculty_id', '=', 'fc.id');
            })
            ->leftJoin('high_schools as hg', function ($join) {
                $join->on('pt.high_school_id', '=', 'hg.id');
            })
            ->leftJoin('users as us', function ($join1) {
                $join1->on('pt.user_id', '=', 'us.id');
            })
            ->where('pt.status', 0)
            ->where(function ($query) {
                $user = Auth::user();
                if ($user->role == 4) {
                    $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                    $query->where('pt.high_school_id', $admin->high_school_id);
                }
            })
            ->groupBy('pt.id', 'pt.first_name', 'pt.last_name', 'pt.middle_name', 'pt.created_at', 'fc.name_uz', 'fc.name_ru', 'fc.name_en', 'us.email')->orderBy('id', 'DESC')->paginate('10');
        return json_encode($petitions);
    }

    public function all_app_count()
    {
        $user = Auth::user();
        $petitions = Petition::where(function ($query) use ($user) {
            if ($user->role == 4) {
                $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                $query->where('high_school_id', $admin->high_school_id);
            }
        })->get()->count();
        return $petitions;
    }

    public function acc_app_count()
    {
        $user = auth()->user();
        $petitions = Petition::where('status', 2)->where(function ($query) use ($user) {
            if ($user->role == 4) {
                $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                $query->where('high_school_id', $admin->high_school_id);
            }
        })->get()->count();
        return $petitions;
    }

    public function return_app_count()
    {
        $user = auth()->user();
        $petitions = Petition::where('status', 1)->where(function ($query) use ($user) {
            if ($user->role == 4) {
                $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                $query->where('high_school_id', $admin->high_school_id);
            }
        })->get()->count();
        return $petitions;
    }

    public function wait_app_count()
    {
        $user = auth()->user();
        $petitions = Petition::where('status', 0)->where(function ($query) use ($user) {
            if ($user->role == 4) {
                $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                $query->where('high_school_id', $admin->high_school_id);
            }
        })->get()->count();
        return $petitions;
    }

    public function admin_reports_faculty()
    {
        $count = DB::table('faculties as fc')->select([
            'fc.id',
            'fc.name_uz',
            'fc.name_ru',
            'fc.name_en',
            DB::raw('count(DISTINCT ptf.id) as ayollar'),
            DB::raw('count(DISTINCT ptm.id) as erkaklar'),
        ])
            ->leftJoin('petitions as ptf', function ($join) {
                $join->on('ptf.faculty_id', '=', 'fc.id');
                $join->where('ptf.gender', '=', 0);
            })
            ->leftJoin('petitions as ptm', function ($join1) {
                $join1->on('ptm.faculty_id', '=', 'fc.id');
                $join1->where('ptm.gender', '=', 1);
            })
            ->groupBy('fc.id', 'fc.name_uz', 'fc.name_ru', 'fc.name_en')->get();
        return view('admin.pages.hisobot.faculty', [
            'data' => $count,
        ]);
    }

    public function admin_reports_faculty_pdf()
    {
        $count = DB::table('faculties as fc')->select([
            'fc.id',
            'fc.name_uz',
            'fc.name_ru',
            'fc.name_en',
            DB::raw('count(DISTINCT ptf.id) as ayollar'),
            DB::raw('count(DISTINCT ptm.id) as erkaklar'),
        ])
            ->leftJoin('petitions as ptf', function ($join) {
                $join->on('ptf.faculty_id', '=', 'fc.id');
                $join->where('ptf.gender', '=', 0);
            })
            ->leftJoin('petitions as ptm', function ($join1) {
                $join1->on('ptm.faculty_id', '=', 'fc.id');
                $join1->where('ptm.gender', '=', 1);
            })
            ->groupBy('fc.id', 'fc.name_uz', 'fc.name_ru', 'fc.name_en')->get();
        return PDF::loadView('admin.pages.hisobot.faculty_pdf', [
            'data' => $count,
        ])->download(date('Y-m-d') . '_yonalish_hisobot.pdf');
    }


    public function admin_messages()
    {

        return view('admin.pages.messages.index', [


        ]);
    }


    public function admin_reports()
    {
        $count = DB::table('regions as rg')->select([
            'rg.id',
            'rg.name_uz',
            'rg.name_ru',
            'rg.name_en',
            DB::raw('count(DISTINCT ptf.id) as ayollar'),
            DB::raw('count(DISTINCT ptm.id) as erkaklar'),

        ])
            ->leftJoin('petitions as ptf', function ($join) {
                $join->on('ptf.region_id', '=', 'rg.id');
                $join->where('ptf.gender', '=', 0);
            })
            ->leftJoin('petitions as ptm', function ($join1) {
                $join1->on('ptm.region_id', '=', 'rg.id');
                $join1->where('ptm.gender', '=', 1);
            })
            ->groupBy('rg.id', 'rg.name_uz', 'rg.name_ru', 'rg.name_en')->get();
        // return $count;
        return view('admin.pages.hisobot.viloyat', [
            'data' => $count,
        ]);
    }

    public function admin_reports_pdf()
    {
        $count = DB::table('regions as rg')->select([
            'rg.id',
            'rg.name_uz',
            'rg.name_ru',
            'rg.name_en',
            DB::raw('count(DISTINCT ptf.id) as ayollar'),
            DB::raw('count(DISTINCT ptm.id) as erkaklar'),

        ])
            ->leftJoin('petitions as ptf', function ($join) {
                $join->on('ptf.region_id', '=', 'rg.id');
                $join->where('ptf.gender', '=', 0);
            })
            ->leftJoin('petitions as ptm', function ($join1) {
                $join1->on('ptm.region_id', '=', 'rg.id');
                $join1->where('ptm.gender', '=', 1);
            })
            ->groupBy('rg.id', 'rg.name_uz', 'rg.name_ru', 'rg.name_en')->get();
        // return $count;
        return PDF::loadView('admin.pages.hisobot.viloyat_pdf', [
            'data' => $count,
        ])->download(date('Y-m-d') . '_viloyat_hisobot.pdf');
    }

    public function admin_reports_area($id)
    {
        $count = DB::table('areas as ar')->select([
            'ar.id',
            'ar.name_uz',
            'ar.name_ru',
            'ar.name_en',
            DB::raw('count(DISTINCT ptf.id) as ayollar'),
            DB::raw('count(DISTINCT ptm.id) as erkaklar'),
        ])
            ->leftJoin('petitions as ptf', function ($join) {
                $join->on('ptf.area_id', '=', 'ar.id');
                $join->where('ptf.gender', '=', 0);
            })
            ->leftJoin('petitions as ptm', function ($join1) {
                $join1->on('ptm.area_id', '=', 'ar.id');
                $join1->where('ptm.gender', '=', 1);
            })
            ->where('ar.region_id', $id)->groupBy('ar.id', 'ar.name_uz', 'ar.name_ru', 'ar.name_en')->get();
        return view('admin.pages.hisobot.tuman', [
            'data' => $count,
            'region_id' => $id,
        ]);
    }

    public function admin_reports_area_pdf($id)
    {
        $count = DB::table('areas as ar')->select([
            'ar.id',
            'ar.name_uz',
            'ar.name_ru',
            'ar.name_en',
            DB::raw('count(DISTINCT ptf.id) as ayollar'),
            DB::raw('count(DISTINCT ptm.id) as erkaklar'),
        ])
            ->leftJoin('petitions as ptf', function ($join) {
                $join->on('ptf.area_id', '=', 'ar.id');
                $join->where('ptf.gender', '=', 0);
            })
            ->leftJoin('petitions as ptm', function ($join1) {
                $join1->on('ptm.area_id', '=', 'ar.id');
                $join1->where('ptm.gender', '=', 1);
            })
            ->where('ar.region_id', $id)->groupBy('ar.id', 'ar.name_uz', 'ar.name_ru', 'ar.name_en')->get();
        $region = Region::find($id);
        return PDF::loadView('admin.pages.hisobot.tuman_pdf', [
            'data' => $count,
            'region' => $region,
        ])->download(date('Y-m-d') . '_tuman_hisobot.pdf');
    }

    public function admin_new_petitions_pdf()
    {
        if (Auth::user()->email_status == 1) {
            $petitions = Petition::where('status', 0)->get();

            return PDF::loadView('admin.pages.petition.news_to_pdf', [
                'petitions' => $petitions,
            ])->download('new_petitions' . date('Y-m-d') . '.pdf');
        } else {
            return redirect(route('petition.index'));
        }


    }

    public function admin_returned_petitions_pdf()
    {

        if (Auth::user()->email_status == 1) {
            $petitions = Petition::where('status', 1)->get();

            return PDF::loadView('admin.pages.petition.returneds_to_pdf', [
                'petitions' => $petitions,
            ])->download('returned_petitions' . date('Y-m-d') . '.pdf');
        } else {
            return redirect(route('petition.index'));
        }


    }

    public function admin_accepted_petitions_pdf()
    {

        if (Auth::user()->email_status == 1) {
            $petitions = Petition::where('status', 2)->get();

            return PDF::loadView('admin.pages.petition.accepteds_to_pdf', [
                'petitions' => $petitions,
            ])->download('accepted_petitions' . date('Y-m-d') . '.pdf');
        } else {
            return redirect(route('petition.index'));
        }


    }

    public function admin_petitions_pdf()
    {

        if (Auth::user()->email_status == 1) {
            $petitions = Petition::all();

            return PDF::loadView('admin.pages.petition.all_to_pdf', [
                'petitions' => $petitions,
            ])->download('all_petitions' . date('Y-m-d') . '.pdf');
        } else {
            return redirect(route('petition.index'));
        }


    }

    public function admin_petition_pdf($id)
    {
//        return "dsfd";

        if (Auth::user()->email_status == 1) {
            $petition = Petition::find($id);
            $name = str_replace(' ', '_', $petition->last_name . $petition->first_name);
            $name = str_replace('\'', '`', $name);
//            return view('admin.pages.petition.to_pdf', [
//                'petition' => $petition,
//            ]);
//             return view('admin.pages.petition.pdf.'.$petition->high_school_id.'.petition_pdf', [
//                'petition' => $petition,
//            ]);
//            return view('admin.pages.petition.pdf.' . $petition->high_school_id . '.petition_pdf', [
//                'petition' => $petition,
//            ]);
            return PDF::loadView('admin.pages.petition.pdf.' . $petition->high_school_id . '.petition_pdf', [
                'petition' => $petition,
            ])->download($name . '.pdf');
        } else {
            return redirect(route('petition.index'));
        }


    }

    public function admin_index()
    {

        // $petitions = Petition::orderBy('created_at' , 'DESC')->get();
        $user = Auth::user();
        $high_schools = HighSchool::where(function ($query) use ($user) {
            if ($user->role == 4) {
                $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                $query->where('id', $admin->high_school_id);
            }
        })->get();
        foreach ($high_schools as $high_school) {
            $count = Petition::where('high_school_id', $high_school->id)->count();
            $count_acc = Petition::where('high_school_id', $high_school->id)->where('status', 2)->count();
            $count_new = Petition::where('high_school_id', $high_school->id)->where('status', 0)->count();
            $count_return = Petition::where('high_school_id', $high_school->id)->where('status', 1)->count();
            $high_school->all_count = $count;
            $high_school->new_count = $count_new;
            $high_school->acc_count = $count_acc;
            $high_school->return_count = $count_return;
        }
        $all_count = Petition::count();
        $new_count = Petition::where('status', 0)->where(function ($query) use ($user) {
            if ($user->role == 4) {
                $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                $query->where('high_school_id', $admin->high_school_id);
            }
        })->count();
        $return_count = Petition::where('status', 1)->where(function ($query) use ($user) {
            if ($user->role == 4) {
                $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                $query->where('high_school_id', $admin->high_school_id);
            }
        })->count();
        $acc_count = Petition::where('status', 2)->where(function ($query) use ($user) {
            if ($user->role == 4) {
                $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                $query->where('high_school_id', $admin->high_school_id);
            }
        })->count();
        // return $all_count;
        return view('admin.pages.petition.new_index', [
            // 'petitions' => $petitions,
            'all_count' => $all_count,
            'new_count' => $new_count,
            'return_count' => $return_count,
            'acc_count' => $acc_count,
            'high_schools' => $high_schools
        ]);


    }

    public function admin_news()
    {

        if (Auth::user()->email_status == 1) {
            $petitions = Petition::where('status', '=', 0)->orderBy('created_at', 'DESC')->get();
            return view('admin.pages.petition.news', [
                'petitions' => $petitions,
            ]);
        } else {
            return redirect(route('petition.index'));
        }


    }

    public function admin_returneds()
    {

        if (Auth::user()->email_status == 1) {
            $petitions = Petition::where('status', '=', 1)->orderBy('created_at', 'DESC')->get();
            return view('admin.pages.petition.returneds', [
                'petitions' => $petitions,
            ]);
        } else {
            return redirect(route('petition.index'));
        }


    }

    public function admin_accepteds()
    {

        if (Auth::user()->email_status == 1) {
            $petitions = Petition::where('status', '=', 2)->orderBy('created_at', 'DESC')->get();
            return view('admin.pages.petition.accepteds', [
                'petitions' => $petitions,
            ]);
        } else {
            return redirect(route('petition.index'));
        }


    }

    public function admin_show($id)
    {
        if (Petition::where('id', $id)->exists()) {
            # code...

            if (Auth::user()->email_status == 1) {
                $petition = Petition::with('high_school')->find($id);
                $edits = Editing::where('petition_id', $id)->get();
                $i = 0;
                $a = [];
                $b = [];
                foreach ($edits as $k) {
                    $a[$i] = $k->column;
                    $b[$k->column] = $k->comment;
                    $i++;
                }
                // return $edits;


                return view('admin.pages.petition.show', [
                    'petition' => $petition,
                    'edits' => $a,
                    'com_mes' => $b,
                ]);
            } else {
                return redirect(route('petition.index'));
            }
        } else {
            return redirect(route('admin.index'));
        }


    }

    public function admin_accept($id)
    {

        if (Auth::user()->email_status == 1) {
            $petition = Petition::find($id);
            $petition->status = 2;
            $petition->yangi = null;

            $petition->comment = "Accepted!";
            $edits = Editing::where('petition_id', $id)->get();
            foreach ($edits as $k) {
                $k->delete();
            }
            $comments = Comment::where('status', 0)->where('from_id', 1)->where('pet_id', $petition->id)->pluck('body');
            $phone_send = User::find($petition->user_id)->email;
            $phone_send = str_replace('+', '', $phone_send);
            $string = 'Tabriklaymiz sizning arizangiz qabul qilindi.!';
            $sms_send = new SmsSend();
            $response = $sms_send->send_one_sms($phone_send, $string);
            $petition->update();
            return redirect(url()->previous());
        } else {
            return redirect(route('petition.index'));
        }


    }

    public function admin_return(Request $request)
    {
        // return $request;
        $admin = Admin::where('user_id', Auth::user()->id)->first();
        $edits = Editing::where('petition_id', $request->petition_id)->get();
        foreach ($edits as $k) {
            $k->delete();
        }
        if ($request->edit) {
            foreach ($request->edit as $key => $value) {
                if ($value != null && $value != ' ') {
                    $ed = new Editing();
                    $ed->petition_id = $request->petition_id;
                    $ed->column = $key;
                    $ed->comment = $value;
                    $ed->admin_id = 0;
                    $ed->save();
                }
                if ($key == 'high_school_id') {
                    if (Editing::where('petition_id', $request->petition_id)->where('column', 'faculty_id')->exists()) {
                        $ed = new Editing();
                        $ed->petition_id = $request->petition_id;
                        $ed->column = 'faculty_id';
                        $ed->comment = '';
                        $ed->admin_id = 0;
                        $ed->save();
                    }
                    if (Editing::where('petition_id', $request->petition_id)->where('column', 'type_language_id')->exists()) {
                        $ed = new Editing();
                        $ed->petition_id = $request->petition_id;
                        $ed->column = 'type_language_id';
                        $ed->comment = '';
                        $ed->admin_id = 0;
                        $ed->save();
                    }
                    if (Editing::where('petition_id', $request->petition_id)->where('column', 'type_education_id')->exists()) {
                        $ed = new Editing();
                        $ed->petition_id = $request->petition_id;
                        $ed->column = 'type_education_id';
                        $ed->comment = '';
                        $ed->admin_id = 0;
                        $ed->save();
                    }
                }
            }
        }

        $id = $request->petition_id;
        $petition = Petition::find($id);
        $petition->status = 1;
        $petition->yangi = null;
        // $petition->comment = "Returned";
        $comments = Comment::where('status', 0)->where('from_id', 1)->where('pet_id', $petition->id)->pluck('body');
        $phone_send = User::find($petition->user_id)->email;
        $phone_send = str_replace('+', '', $phone_send);
        $string = 'Sizning arizangiz qaytarildi. Tizimga qayta kirib xatoliklarni to\'g\'irlashingizni so\'raymiz!';
        $sms_send = new SmsSend();
        $response = $sms_send->send_one_sms($phone_send, $string);
        $petition->update();

        return redirect(url()->previous());


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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
