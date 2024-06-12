<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disability extends Model
{
    protected $table = 'disability_status';
    protected $fillable = [
    	'name_uz',
    	'name_ru',
    	'name_en',
    ];
}
