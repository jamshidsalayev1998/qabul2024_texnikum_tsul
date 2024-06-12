<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edutype extends Model
{
    protected $table = 'type_education';
    protected $fillable = [
    	'name_uz',
    	'name_ru',
    	'name_en',
    ];
}
