<?php

namespace App;

use App\FacultyTypeLang;
use App\Edutype;
use App\Languagetype;
use App\FacultyTypeEdu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class HighSchoolAdmin extends Model
{
    protected $table = 'high_school_admins';
    public function fio(){
        return $this->name;
    }
    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function high_school(){
        return $this->belongsTo(HighSchool::class , 'high_school_id' , 'id');
    }

}
