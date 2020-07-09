<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
     use HasRoles;
     
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