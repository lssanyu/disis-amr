<?php

namespace App\Http\Controllers;

use App\Models\Pathogen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;



class HH_IsolatesController extends Controller {
	
public function __construct()
    {
        $this->middleware('auth');
    }

public function getDefaultData()
{ 

	$ReprtingPeriod = 'Jan-Mar 19';
	$facility = 'Arua RRH';

  	$periods = Pathogen::distinct('ReportingPeriod')->pluck('ReportingPeriod');	
  	$facilities = Pathogen::distinct('facility')->pluck('facility');
		
	$organisms =  Pathogen::distinct('Organism')->where([
			['ReportingPeriod',$ReprtingPeriod],
			['Facility',$facility]
			])->pluck('Organism');
	
		//select Organism 
		$specimenNamesArray =array();
		$data = array();
		$series_names =array();

		$Specimen_result = Pathogen::distinct('Specimentype')->where('ReportingPeriod',$ReprtingPeriod)->pluck('Specimentype');		
    
                	for ($i=0; $i<count($Specimen_result); $i++) {   	
                	          				
					 $Specimen_ind = $Specimen_result[$i]; 

            		 array_push($series_names, $Specimen_result); 
                  
                     $series_data =array();

					foreach($organisms as $org){						

						$result= Pathogen::where([
							['Organism',$org],
							['ReportingPeriod',$ReprtingPeriod],
							['Specimentype',$Specimen_ind]
							])->get();

						$numberOfRows = $result->count();						
							if($numberOfRows=0){
								$specimen_value = 0;	
							}else{

								$specimen_value = $result->pluck('Numberofisolates');					  
								 
							}						
						
						array_push($series_data, $specimen_value);
												
					}

					$data[] = array("name"=>$Specimen_ind, "data"=>$series_data);
				} 			


				 return view('hh_isolateschart', array( 'periods' => $periods, 'series'=> $data, 'categories'=>$organisms, 'facilities'=>$facilities,'facility'=>$facility, 'period'=>$ReprtingPeriod));
}


public function loadDataForSpecificQuarter() 
	{	  

		  	$organisms = [];
			$selectedP =  request()->rPeriod;
			$facility =  request()->facility;				

	        $ReprtingPeriod = str_replace('%20',' ',$selectedP);   		
			
			$organisms =  Pathogen::distinct('Organism')->where([
				['ReportingPeriod',$ReprtingPeriod],
				['Facility',$facility]
				])->pluck('Organism');
			
			//select specimen
			$specimenNamesArray =array();
			$data = array();
			$series_names =array();
			
			$Specimen_result = Pathogen::distinct('Specimentype')->where('ReportingPeriod',$ReprtingPeriod)->pluck('Specimentype');		    
	                	for ($i=0; $i<count($Specimen_result); $i++) {   	
	                	          				
						 $Specimen_ind = $Specimen_result[$i]; 

	            		 array_push($series_names, $Specimen_result); 
	                  
	                     $series_data =array();

						foreach($organisms as $org){						

							$result= Pathogen::where([
								['Organism',$org],
								['ReportingPeriod',$ReprtingPeriod],
								['Specimentype',$Specimen_ind]
								])->get();

							$numberOfRows = $result->count();			

								if($numberOfRows=0){
									$specimen_value = 0;	
								}else{

									$specimen_value = $result->pluck('Numberofisolates');					  
									 
								}						
							
							array_push($series_data, $specimen_value);												
						}

						$data[] = array("name"=>$Specimen_ind, "data"=>$series_data);
					} 
					\Log::info($facility);				

	 			return response()->json(array('series' => $data, 'categories'=> $organisms));
			      
			
	}

	   
	
}





