<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendSmsResponses extends Model
{
    protected $table = 'responses_send_sms';
    protected $fillable = [
    	'number',
    	'type',
    	'response_json',
    ];

    
}
