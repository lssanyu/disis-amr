<?php

namespace App\Http\Controllers;

use App\Models\SamplesWithGrowth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;
use Log;


class SamplesWithGrowthController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

/*============Load Default Graph ================*/

	public function getDefaultData()
	{ 	

	  	$facilities = SamplesWithGrowth::distinct('facility')->pluck('facility');

	  	$periods = 	SamplesWithGrowth::distinct('period')->pluck('period');
		
			//select Organism 
			$specimenNamesArray =array();
			$data = array();
			$series_names =array();

			$specimenTypes = SamplesWithGrowth::distinct('specimen')->pluck('specimen');		
	    
	                	for ($i=0; $i<count($specimenTypes); $i++) {   	
	                	          				
						 $specimenType = $specimenTypes[$i]; 

	            		 array_push($series_names, $specimenTypes); 
	                  
	                     $series_data =array();

						foreach($periods as $period){						

							$result= SamplesWithGrowth::where([['specimen',$specimenType],['period',$period]])->get();			
							$numberOfRows = $result->count();						 

								if($numberOfRows=0){
									$specimen_value = 0;	
								}else{

									$specimen_value = $result->sum('nogrowthsamples');									
								}						
							
							array_push($series_data, $specimen_value);													
						}

						$data[] = array("name"=>$specimenType, "data"=>$series_data);
						log::info($data);
					}

					 return view('sampleswithgrowth', array( 'facilities' => $facilities, 'series'=> $data, 'categories'=>$periods));
	}

/*============Load Graph for All Facilities ==================================*/

	public function getAllData()
	{ 	

	  	$facilities = SamplesWithGrowth::distinct('facility')->pluck('facility');

	  	$periods = 	SamplesWithGrowth::distinct('period')->pluck('period');
		
			//select Organism 
			$specimenNamesArray =array();
			$data = array();
			$series_names =array();

			$specimenTypes = SamplesWithGrowth::distinct('specimen')->pluck('specimen');		
	    
	                	for ($i=0; $i<count($specimenTypes); $i++) {   	
	                	          				
						 $specimenType = $specimenTypes[$i]; 

	            		 array_push($series_names, $specimenTypes); 
	                  
	                     $series_data =array();

						foreach($periods as $period){						

							$result= SamplesWithGrowth::where([['specimen',$specimenType],['period',$period]])->get();			
							$numberOfRows = $result->count();						 

								if($numberOfRows=0){
									$specimen_value = 0;	
								}else{

									$specimen_value = $result->sum('nogrowthsamples');									
								}						
							
							array_push($series_data, $specimen_value);													
						}

						$data[] = array("name"=>$specimenType, "data"=>$series_data);
						log::info($data);
					}				

				return response()->json(array('series' => $data, 'categories'=> $periods));
	}

/*============Load Graph Per Facility ================*/

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