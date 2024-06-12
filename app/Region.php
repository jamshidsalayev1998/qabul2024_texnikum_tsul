<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';
    protected $fillable = [
    	'name_uz',
    	'name_ru',
    	'name_en',
    	'country_id'
    ];
}
