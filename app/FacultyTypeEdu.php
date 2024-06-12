<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyTypeEdu extends Model
{
    protected $table = 'faculty_type_education';
    protected $fillable = [
    	'faculty_id',
    	'type_education_id',
    	
    ];
}
