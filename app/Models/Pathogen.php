<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pathogen extends Model
{
	
	 // protected $table = 'glassprioritypathogens';
	 // //protected $primarykey = 'OID';
	
  //   protected $fillable = [
  //   	'Number',
  //   	'Organism',
  //   	'ReportingPeriod',
  //   	'Specimen'
  //   ];


	
	 protected $table = 'hh_organismsisolated';


	
	 //protected $primarykey = 'OID';
	
    protected $fillable = [
    	'Number of isolates',
    	'Organism',
    	'ReportingPeriod',
    	'Specimentype',
    	'Facility',
    	'Numberofisolates'
    ];
}
