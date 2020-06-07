<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HH_Resistance  extends Model
{

	 protected $table = 'hh_resistance';
	 
	 protected $fillable =
	  [
 		'Organism',
		'antibiotictested',
		'percentageresistance',
		'lowerlimit',
		'upperlimit',
		'Specimentype',
		'Numberofisolates'
	  ];


}