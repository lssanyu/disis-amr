<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SamplesWithGrowth extends Model
{
	
	 protected $table = 'hh_sampleswithgrowth';	
	 	
    protected $fillable = [
    	'Number of isolates',
    	'specimen',
    	'period',
    	'facility',
    	'nogrowthsamples'
    ];
}
