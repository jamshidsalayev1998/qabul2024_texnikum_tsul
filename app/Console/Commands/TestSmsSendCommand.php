<?php

namespace App\Console\Commands;

use App\Services\SmsSendService;
use Illuminate\Console\Command;

class TestSmsSendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testSms:sendTestSms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $username = env('SMS_SERVICE_USERNAME' , 'yuridikinstitut');
        $password = env('SMS_SERVICE_PASSWORD' , 'ph1$Tv@dX');
        $url = env('SMS_SERVICE_URL' , 'http://91.204.239.44/broker-api/send');
        $this->info("Authorization: Basic " . base64_encode("$username:$password"));
        $phone = '998994571669';
        $text = 'Salom';
        $response = SmsSendService::send_one_sms($phone,$text);
        $this->info(json_encode($response));
    }
}
