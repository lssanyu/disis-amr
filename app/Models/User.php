<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table = 'users';
	 //protected $primarykey = 'OID';
	
    protected $fillable = [
    	'first_name',
    	'last_name', 
    	'email',
    	'user_name',
    	'password',
    	'remember_token',
    	'created_at',
    	'updated_at'    	
    ];


}