<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OtherController extends Controller
{
    public function real_time(){
        date_default_timezone_set('Asia/Tashkent');
          $date = date('Y-m-d h:i:s', time());
          $date1 = strtotime($date);
          $dd =  DB::table('date_admission as d')->select('d.date_end')->where('status' , 1)->first();
          $date2 = strtotime($dd->date_end);  
          $diff = abs($date2 - $date1);
          $years = floor($diff / (365*60*60*24));
          $months = floor(($diff - $years * 365*60*60*24)/ (30*60*60*24));
          $days = floor(($diff - $years * 365*60*60*24 -  $months*30*60*60*24)/ (60*60*24)); 
          $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
          $minutes = floor(($diff - $years * 365*60*60*24  - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
          $seconds = floor(($diff - $years * 365*60*60*24   - $months*30*60*60*24 - $days*60*60*24  - $hours*60*60 - $minutes*60));
          $arr['years'] = $years;
          $arr['months'] = $months;
          $arr['days'] = $days;
          $arr['hours'] = $hours;
          $arr['minutes'] = $minutes;
          $arr['seconds'] = $seconds;
          return $arr;
    }
}
