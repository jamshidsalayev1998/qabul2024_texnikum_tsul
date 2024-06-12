<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Languagetype extends Model
{
    protected $table = 'type_language';
    protected $fillable = [
    	'name_uz',
    	'name_ru',
    	'name_en',
    ];
}
