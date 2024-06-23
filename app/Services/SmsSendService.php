<?php
namespace App\Services;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class SmsSendService
{
    public static function send_one_sms($phone, $text)
    {
        $status = 0;
        $data = [];
        $message = '';
        $username = env('SMS_SERVICE_USERNAME' , 'yuridikinstitut');
        $password = env('SMS_SERVICE_PASSWORD' , 'ph1$Tv@dX');
        $url = env('SMS_SERVICE_URL' , 'http://91.204.239.44/broker-api/send');
        $headers = [
            "Authorization: Basic " . base64_encode("$username:$password"),
            "Cache-Control: no-cache",
            "Content-Type: application/json",
        ];
        $body['messages'] = [
            [
                'recipient' => $phone,
                'message-id' => RandomStringService::randomNumberHelper(10),
                'sms' => [
                    'originator' => '3700',
                    'content' => [
                        'text' => $text
                    ]
                ]
            ]
        ];
        echo "Headers: " . print_r($headers, true);
echo "Body: " . json_encode($body, JSON_PRETTY_PRINT);
        $client = new Client();
        try{
            $status = 1;
            $response = $client->post($url, [
                RequestOptions::JSON => $body,
                'headers' => $headers
            ]);
            $message = 'success';
            $data = json_decode($response->getBody()->getContents(),true);
        }catch(Exception $exception){
            $data = [
                'error' => [
                    'message' => $exception->getMessage(),
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine()
                ],
                'body' => $body,
                'url' => $url,
                'headers' => $headers,
                'auth' => [
                    'username' => $username,
                    'password' => $password
                ]
            ];
            $message = 'error while sending request';
        }
        return [
            'data' => $data,
            'message' => $message,
            'status' => $status
        ];
    }
}
