<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
	 protected $table = 'click';
	 //protected $primarykey = 'OID';
	
    protected $fillable = [
    	'numberofclick',
    	'created_at', 
    	'updated_at'
    	
    ];
}
