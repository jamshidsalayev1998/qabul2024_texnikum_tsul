<?php

namespace App;

use App\FacultyTypeLang;
use App\Edutype;
use App\Languagetype;
use App\FacultyTypeEdu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class HighSchool extends Model
{
    protected $table = 'high_schools';
    protected $fillable = [
    	'name_uz',
    	'name_ru',
    	'name_en',
	];
    public function enables(){
        return $this->hasMany(HighSchoolDocumentEnable::class , 'high_school_id' , 'id');
    }
}
