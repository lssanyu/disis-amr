<?php

namespace App\Http\Controllers;

use App\Models\AH_Resistance;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;





class AH_ResistanceController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function getDefaultData()
	{ 

			$organism = "Eco";
			

		  	$organisms = AH_Resistance::distinct('organism')->pluck('organism'); 

			$antibiotics =  AH_Resistance::distinct('Antibiotic')->where('organism',$organism)->pluck('Antibiotic');	
			$resistanceData =  AH_Resistance::distinct('Antibiotic')->where('organism',$organism)->get();
			

			$dataArray = array();
			$errorArray = array();

			foreach ($resistanceData as $resData) {					
				array_push($dataArray, $resData->percentage);
				
				array_push($errorArray,[$resData->lowerlimit,$resData->upperlimit]);
			}

			

			//\Log::info($dataArray);						
			return view('ah_resistance', array( 'organisms' => $organisms, 'series'=> $dataArray, 'categories'=>$antibiotics, 'errorData'=>$errorArray,'organism'=>$organism));

	}


	public function loadDataForSpecificOrganism()
	{
				
				$organism = request()->organism;

				$organisms = AH_Resistance::distinct('organism')->pluck('organism'); 

				$antibiotics =  AH_Resistance::distinct('Antibiotic')->where('organism',$organism)->pluck('Antibiotic');	
				$resistanceData =  AH_Resistance::distinct('Antibiotic')->where('organism',$organism)->get();
				

				$dataArray = array();
				$errorArray = array();

				foreach ($resistanceData as $resData) {					
					array_push($dataArray, $resData->percentage);
					
					array_push($errorArray,[$resData->lowerlimit,$resData->upperlimit]);
				}			

				
				return response()->json(array('series' => $dataArray, 'categories'=> $antibiotics, 'errorData'=>$errorArray));

	}



}
