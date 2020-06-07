<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AH_Resistance  extends Model
{

	 protected $table = 'ah_organismscombined';
	 
	 protected $fillable =
	  [
 		'organism',
		'Antibiotic',
		'percentage',
		'lowerlimit',
		'upperlimit'
	  ];


}