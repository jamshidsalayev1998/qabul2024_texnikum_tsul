<?php

namespace App;

use App\FacultyTypeLang;
use App\Edutype;
use App\Languagetype;
use App\FacultyTypeEdu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Faculty extends Model
{
    protected $table = 'faculties';
    protected $fillable = [
    	'name_uz',
    	'name_ru',
    	'name_en',
	];

	/**
     * The "booted" method of the model.
     *
     * @return void
     */
    // protected static function booted()
    // {
    //     static::addGlobalScope('status', function (Builder $builder) {
    //         $builder->where('status' , '=' , 0);
    //     });
    // }

    public function getEduTypes(){
    	$edus = FacultyTypeEdu::where('faculty_id' , $this->id)->pluck('type_education_id');
    	$types = Edutype::whereIn('id' , $edus)->get();
    	return $types;
    }
    public function getLangTypes(){
    	$edusl = FacultyTypeLang::where('faculty_id' , $this->id)->pluck('type_language_id');
    	$types = Languagetype::whereIn('id' , $edusl)->get();
    	return $types;
    }

    public function high_school(){
        return $this->belongsTo(HighSchool::class , 'high_school_id' , 'id');
    }
}
