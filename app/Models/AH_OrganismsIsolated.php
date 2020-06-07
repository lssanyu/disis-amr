<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AH_OrganismsIsolated extends Model
{

  protected $table = 'ah_organismsisolated';

  protected $fillable = 
  [
	'organism',
	'district',
	'numberisolates',
	'percentage'
   ];

}