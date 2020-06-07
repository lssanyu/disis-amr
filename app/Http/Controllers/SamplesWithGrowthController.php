<?php

namespace App\Http\Controllers;

use App\Models\SamplesWithGrowth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;


class SamplesWithGrowthController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function getDefaultData()
	{ 

		$facility = "Arua";	

	  	$facilities = SamplesWithGrowth::distinct('facility')->pluck('facility');

	  	$periods = 	SamplesWithGrowth::distinct('period')->where('facility',$facility)->pluck('period');
		
			//select Organism 
			$specimenNamesArray =array();
			$data = array();
			$series_names =array();

			$Specimen_result = SamplesWithGrowth::distinct('specimen')->where('facility',$facility)->pluck('specimen');		
	    
	                	for ($i=0; $i<count($Specimen_result); $i++) {   	
	                	          				
						 $Specimen_ind = $Specimen_result[$i]; 

	            		 array_push($series_names, $Specimen_result); 
	                  
	                     $series_data =array();

						foreach($periods as $period){						

							$result= SamplesWithGrowth::where([
								['period',$period],
								['facility',$facility],
								['specimen',$Specimen_ind]
								])->get();

							$numberOfRows = $result->count();						 

								if($numberOfRows=0){
									$specimen_value = 0;	
								}else{

									$specimen_value = $result->pluck('nogrowthsamples');					  
									 
								}						
							
							array_push($series_data, $specimen_value);
													
						}

						$data[] = array("name"=>$Specimen_ind, "data"=>$series_data);
					}

					 return view('sampleswithgrowth', array( 'facilities' => $facilities, 'series'=> $data, 'categories'=>$periods, 'facility'=>$facility));

	}


public function loadDataPerFacility()
{ 	

	$facility =  request()->facility;
	

  	$facilities = SamplesWithGrowth::distinct('facility')->pluck('facility');

  	$periods = 	SamplesWithGrowth::distinct('period')->where('facility',$facility)->pluck('period');		
	
	 
		$specimenNamesArray =array();
		$data = array();
		$series_names =array();

		$Specimen_result = SamplesWithGrowth::distinct('specimen')->where('facility',$facility)->pluck('specimen');		
    
                	for ($i=0; $i<count($Specimen_result); $i++) {   	
                	          				
					 $Specimen_ind = $Specimen_result[$i]; 

            		 array_push($series_names, $Specimen_result); 
                  
                     $series_data =array();

					foreach($periods as $period){						

						$result= SamplesWithGrowth::where([
							['period',$period],
							['facility',$facility],
							['specimen',$Specimen_ind]
							])->get();

						$numberOfRows = $result->count();
						 // echo $numberOfRows;

							if($numberOfRows=0){
								$specimen_value = 0;	
							}else{

								$specimen_value = $result->pluck('nogrowthsamples');					  
								 
							}						
						
						array_push($series_data, $specimen_value);
												
					}

					$data[] = array("name"=>$Specimen_ind, "data"=>$series_data);
				}
				 
				 return response()->json(array('series' => $data, 'categories'=> $periods));

}





}