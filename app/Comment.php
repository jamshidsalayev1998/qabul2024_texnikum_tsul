<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $fillable = [
    	'from_id',
    	'to_id',
    	'body',
    	'status',
    ];
}
