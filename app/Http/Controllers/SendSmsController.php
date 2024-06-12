<?php

namespace App\Http\Controllers;

use App\SendSmsResponses;
use Illuminate\Http\Request;

class SendSmsController extends Controller
{
   public function send_sms(){
    $code = 'lalalla';
    $string = 'Your password for admission.ytit.uz is  '.$code.'  Please save it';
    // return $string;

    $phone = '+998994571669';
    $phone_send = str_replace('+' , '' , $phone);
    $username = 'yodju';
    $password = 'oeTT8C';
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "http://91.204.239.44/broker-api/send",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{ \"messages\": [ { \"recipient\": \"$phone_send\", \"message-id\": \"2016256\", \"sms\": { \"originator\": \"3700\", \"content\": { \"text\": \"$string\" } } } ] }",
    CURLOPT_HTTPHEADER => array(
            "Authorization: Basic ".base64_encode("$username:$password"),
            "Cache-Control: no-cache",
            "Content-Type: application/json",
        ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    $res = new SendSmsResponses();
    $res->type='lala';
    $res->number = $phone;
    $res->response_json = $response;
    $res->error_json = $err;
    $res->save();
    return $response;
   }
   public function test_curl(){
    $ch = curl_init("https://gorest.co.in/public-api/users");
    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
    return $err;
   }
}
