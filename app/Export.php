<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    protected $table = 'exports';
    protected $fillable = ['id' , 'admin_id' , 'name_file', 'created_at' , 'updated_at'];
}
