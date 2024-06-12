<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeschool extends Model
{
    protected $table = 'type_school';
    protected $fillable = [
    	'name_uz',
    	'name_ru',
    	'name_en',
    ];
}
