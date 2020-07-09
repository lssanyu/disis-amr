<?php

namespace App\Http\Controllers;

use App\Models\SamplesCultured;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;

class SamplesCulturedController extends Controller
{

/*============Load Default Samples Cultured Graph ================*/

	public function getDefaultData()
	{ 		

	  	$facilities = SamplesCultured::distinct('facility')->pluck('facility');

	  	$periods = 	SamplesCultured::distinct('period')->pluck('period');		
			
			$specimenNamesArray =array();
			$data = array();
			$series_names =array();

			$specimenTypes = SamplesCultured::distinct('specimen')->pluck('specimen');		
	    
	                	for ($i=0; $i<count($specimenTypes); $i++) {   	
	                	          				
						 $specimenType = $specimenTypes[$i]; 

	            		 array_push($series_names, $specimenTypes); 
	                  
	                     $series_data =array();

						foreach($periods as $period){						

							$result= SamplesCultured::where([
								['period',$period],								
								['specimen',$specimenType]
								])->get();

							$numberOfRows = $result->count();						 

								if($numberOfRows=0){
									$specimen_value = 0;	
								}else{

									$specimen_value = $result->sum('culturedsamples');					  
									 
								}														
							
							array_push($series_data, $specimen_value);
													
						}

						$data[] = array("name"=>$specimenType, "data"=>$series_data);
					}

					 return view('samplescultured', array( 'facilities' => $facilities, 'series'=> $data, 'categories'=>$periods));

	}

	/*============Load Graph for All Facilities ==================================*/

	public function getAllData()
	{ 		

	  	$facilities = SamplesCultured::distinct('facility')->pluck('facility');

	  	$periods = 	SamplesCultured::distinct('period')->pluck('period');		
			
			$specimenNamesArray =array();
			$data = array();
			$series_names =array();

			$specimenTypes = SamplesCultured::distinct('specimen')->pluck('specimen');		
	    
	                	for ($i=0; $i<count($specimenTypes); $i++) {   	
	                	          				
						 $specimenType = $specimenTypes[$i]; 

	            		 array_push($series_names, $specimenTypes); 
	                  
	                     $series_data =array();

						foreach($periods as $period){						

							$result= SamplesCultured::where([
								['period',$period],								
								['specimen',$specimenType]
								])->get();

							$numberOfRows = $result->count();						 

								if($numberOfRows=0){
									$specimen_value = 0;	
								}else{

									$specimen_value = $result->sum('culturedsamples');					  
									 
								}														
							
							array_push($series_data, $specimen_value);
													
						}

						$data[] = array("name"=>$specimenType, "data"=>$series_data);
					}
					
					 return response()->json(array('series' => $data, 'categories'=> $periods));
	}



  
/*=======================Load Graph per Facility================*/

public function loadCulturedGraph()
{
	$facility =  request()->facility;
	

  	$facilities = SamplesCultured::distinct('facility')->pluck('facility');

  	$periods = 	SamplesCultured::distinct('period')->where('facility',$facility)->pluck('period');		
	
	 
		$specimenNamesArray =array();
		$data = array();
		$series_names =array();

		$Specimen_result = SamplesCultured::distinct('specimen')->where('facility',$facility)->pluck('specimen');		
    
                	for ($i=0; $i<count($Specimen_result); $i++) {   	
                	          				
					 $Specimen_ind = $Specimen_result[$i]; 

            		 array_push($series_names, $Specimen_result); 
                  
                     $series_data =array();

					foreach($periods as $period){						

						$result= SamplesCultured::where([
							['period',$period],
							['facility',$facility],
							['specimen',$Specimen_ind]
							])->get();

						$numberOfRows = $result->count();						

							if($numberOfRows=0){
								$specimen_value = 0;	
							}else{

								$specimen_value = $result->pluck('culturedsamples');					  
								 
							}						
						
						array_push($series_data, $specimen_value);
												
					}

					$data[] = array("name"=>$Specimen_ind, "data"=>$series_data);
				}
				 
				 return response()->json(array('series' => $data, 'categories'=> $periods));


		}
}
