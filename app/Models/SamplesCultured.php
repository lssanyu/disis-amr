<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SamplesCultured extends Model
{
	
	 protected $table = 'hh_samplescultured';	
	 	
    protected $fillable = [
    	'facility',
    	'specimen',
    	'period',
    	'culturedsamples'
    	
    ];
}
