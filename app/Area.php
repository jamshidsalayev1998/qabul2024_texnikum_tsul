<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $fillable = [
    	'name_uz',
    	'name_ru',
    	'name_en',
    	'region_id'
    ];

    public function getRegion(){
    	$region = Region::find($this->region_id);
    	return $region;
    }
}
