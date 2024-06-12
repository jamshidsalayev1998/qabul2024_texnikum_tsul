<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editing extends Model
{
    protected $table = 'editing';
    protected $fillable = [
    	'petition_id',
    	'comment',
    	'column',
    	'admin_id',
    	
    ];
}
