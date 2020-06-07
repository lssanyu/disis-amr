<?php

namespace App\Http\Controllers;

use App\Models\HH_Resistance;
use App\Models\Pathogen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;





class HH_ResistanceController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function getDefaultData()
	{ 

			$organism = 'Escherichia Coli';
			$specimen = 'Blood';

			

		  	$organisms = HH_Resistance::distinct('Organism')->pluck('Organism');
			$antibiotics =  HH_Resistance::distinct('antibiotictested')->where('organism',$organism)->pluck('antibiotictested');

			$specimenData =  HH_Resistance::distinct('Specimentype')->pluck('Specimentype');
			
			$resistanceData = HH_Resistance::distinct('Antibiotic')->where([
			['Organism','Escherichia coli'],['Specimentype',$specimen]
			])->get();

			$n = Pathogen::where([['Specimentype', $specimen],['Organism', $organism]])->sum('Numberofisolates');
			

			$dataArray = array();
			$errorArray = array();
			

			foreach ($resistanceData as $resData) {					
				array_push($dataArray, $resData->percentageresistance);
				
				array_push($errorArray,[$resData->lowerlimit,$resData->upperlimit]);
				
			}

								
			return view('hh_resistance', array( 'organisms' => $organisms, 'series'=> $dataArray, 'categories'=>$antibiotics, 'errorData'=>$errorArray, 'specimenData'=> $specimenData, 'numberOfIsolates'=> $n, 'organism'=>$organism, 'specimen' =>$specimen));

	}

			
		public function loadHumanResData()
		{ 			

			$selectedOrganism =  request()->organism;
			$selectedSpecimen =  request()->specimen;

			

		  	$organisms = HH_Resistance::distinct('Organism')->pluck('Organism');
			$antibiotics =  HH_Resistance::distinct('antibiotictested')->where('organism',$selectedOrganism)->pluck('antibiotictested');

			$specimenData =  HH_Resistance::distinct('Specimentype')->pluck('Specimentype');
			
			$resistanceData = HH_Resistance::distinct('Antibiotic')->where([
			['Organism',$selectedOrganism],['Specimentype',$selectedSpecimen]
			])->get();

			// if($selectedOrganism =='Staphylococcus aureus Species'){
			// 	$editedOrganism = ' Staphylococcus aureus';
			// }elseif ($selectedOrganism=='Salmonella Species') {
			// 	$$editedOrganism = 'Salmonella sp.';
			// }

			$n = Pathogen::where([['Specimentype', $selectedSpecimen],['Organism', $selectedOrganism]])->sum('Numberofisolates');
			
			

			$dataArray = array();
			$errorArray = array();
			

			foreach ($resistanceData as $resData) {					
				array_push($dataArray, $resData->percentageresistance);
				
				array_push($errorArray,[$resData->lowerlimit,$resData->upperlimit]);				
			}
			

			//\Log::info($selectedOrganism);						
			
			return response()->json(array('series' => $dataArray, 'categories'=> $antibiotics,'errorData'=>$errorArray,'numberOfIsolates'=> $n));

		}




}
