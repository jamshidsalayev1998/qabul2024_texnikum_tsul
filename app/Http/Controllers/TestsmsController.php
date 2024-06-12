<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestsmsController extends Controller
{
    public function test_sms(){
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
		CURLOPT_POSTFIELDS => "{ \"messages\": [ { \"recipient\": \"998994571669\", \"message-id\": \"2016256\", \"sms\": { \"originator\": \"3700\", \"content\": { \"text\": \"Test text\" } } } ] }",
		CURLOPT_HTTPHEADER => array(
				"Authorization: Basic ".base64_encode("$username:$password"),
				"Cache-Control: no-cache",
				"Content-Type: application/json",
			),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		// if ($err) {
		// return "cURL Error #:" . $err;
		// } else {
		// return $response;
		// }
    }
}
