<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsSend extends Model
{
//    protected $table = 'responses_send_sms';
    protected $username = 'yuridikinstitut';
    protected $password = 'ph1$Tv@dX';
    public $url = 'http://91.204.239.44/broker-api/send';

    public function send_one_sms($number, $text)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURL_IPRESOLVE_WHATEVER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"messages\": [ { \"recipient\": \"$number\", \"message-id\": \"2016256\", \"sms\": { \"originator\": \"3700\", \"content\": { \"text\": \"$text\" } } } ] }",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Basic " . base64_encode("$this->username:$this->password"),
                "Cache-Control: no-cache",
                "Content-Type: application/json",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return $response;
    }

    public function send_many_sms($body)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURL_IPRESOLVE_WHATEVER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Basic " . base64_encode("$this->username:$this->password"),
                "Cache-Control: no-cache",
                "Content-Type: application/json",
            ),
        ));
        $array['response'] = curl_exec($curl);
        $array['error'] = curl_error($curl);;

        curl_close($curl);
        return $array;
    }


}
