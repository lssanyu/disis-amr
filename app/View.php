<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
	 protected $table = 'view';
	 //protected $primarykey = 'OID';
	
    protected $fillable = [
    	'numberofclick',
    	'created_at', 
    	'updated_at'
    	
    ];
}
