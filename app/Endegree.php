<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endegree extends Model
{
    protected $table = 'english_degree';
    protected $fillable = [
    	'name_uz',
    	'name_ru',
    	'name_en',
    ];
}
