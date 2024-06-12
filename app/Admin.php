<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Admin extends Model
{
    protected $table = 'admins';
    protected $fillable = [
    	'first_name',
    	'last_name',
    	'middle_name',
    	'user_id',
    	'status',
    ];
    public function getUser(){
    	$user = User::find($this->user_id);
    	return $user;
    }
    public function getStatus(){
    	if ($this->status == 1) {
    		return "Aktive";
    	}
    	else{
    		return "Passive";
    	}
    }
    public function fio(){
    	return $this->last_name.' '.$this->first_name.' '.$this->middle_name;
    }
    public function getRole(){
        $user = User::find($this->user_id);
        return $user->role;
    }
    public function getEmail(){
        $user = User::find($this->user_id);
        return $user->email;
    }
}
