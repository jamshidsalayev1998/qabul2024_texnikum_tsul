<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyTypeLang extends Model
{
    protected $table = 'faculty_type_language';
    protected $fillable = [
    	'faculty_id',
    	'type_language_id',
    ];
}
