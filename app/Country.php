<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = [
    	'name_uz',
    	'name_ru',
    	'name_en',
    ];
}
