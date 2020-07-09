<?php

namespace App\Http\Controllers;

use App\Models\Pathogen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Redirect;
use Log;



class HH_IsolatesController extends Controller {
	
public function __construct()
    {       
        // $this->middleware(['auth', 'permission:view amr|view resistance|register users|edit users|delete users']);
    }

/*============Load Default Graph ======================================================*/
public function getDefaultData()
{ 

  	$periods = Pathogen::distinct('ReportingPeriod')->pluck('ReportingPeriod');	
  	$facilities = Pathogen::distinct('facility')->pluck('facility');		
	$organisms =  Pathogen::distinct('Organism')->pluck('Organism');
	$specimenTypes = Pathogen::distinct('Specimentype')->pluck('Specimentype');		
			
		$specimenNamesArray =array();
		$data = array();
		$series_names =array();		
    
                	for ($i=0; $i<count($specimenTypes); $i++) {   	
                	          				
						 $specimenType = $specimenTypes[$i]; 

	            		 array_push($series_names, $specimenTypes); 
	                  
	                     $series_data =array();

						foreach($organisms as $org){						

							$result= Pathogen::where([
								['Organism',$org],							
								['Specimentype',$specimenType]
								])->get();

							$numberOfRows = $result->count();						
								if($numberOfRows=0){
									$specimen_value = 0;	
								}else{

									$specimen_value = $result->sum('Numberofisolates');
									 
								}						
							
							array_push($series_data, $specimen_value);
													
						}

					$data[] = array("name"=>$specimenType, "data"=>$series_data);
				} 					
			 

				return view('hh_isolateschart', array( 'periods' => $periods, 'series'=> $data, 'categories'=>$organisms, 'facilities'=>$facilities));
}

/*============Get Combined data ======================================================*/

public function getAllData()
{ 

  	$periods = Pathogen::distinct('ReportingPeriod')->pluck('ReportingPeriod');	
  	$facilities = Pathogen::distinct('facility')->pluck('facility');		
	$organisms =  Pathogen::distinct('Organism')->pluck('Organism');
	$specimenTypes = Pathogen::distinct('Specimentype')->pluck('Specimentype');		
			
		$specimenNamesArray =array();
		$data = array();
		$series_names =array();		
    
                	for ($i=0; $i<count($specimenTypes); $i++) {   	
                	          				
						 $specimenType = $specimenTypes[$i]; 

	            		 array_push($series_names, $specimenTypes); 
	                  
	                     $series_data =array();

						foreach($organisms as $org){						

							$result= Pathogen::where([
								['Organism',$org],							
								['Specimentype',$specimenType]
								])->get();

							$numberOfRows = $result->count();						
								if($numberOfRows=0){
									$specimen_value = 0;	
								}else{

									$specimen_value = $result->sum('Numberofisolates');
									 
								}						
							
							array_push($series_data, $specimen_value);
													
						}

					$data[] = array("name"=>$specimenType, "data"=>$series_data);
				}			

				return response()->json(array('series' => $data, 'categories'=> $organisms));
}

/*================================Load Specific Data ======================================*/

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
			
			$data = array();			
			
			$specimenTypes = Pathogen::distinct('Specimentype')->where([['Facility',$facility],['ReportingPeriod',$ReprtingPeriod]])->pluck('Specimentype');						    
	                	
	                		foreach($specimenTypes as $speci){		                	          				
							
	                			 $SpecimenType = $speci;		            		
		                  
		                     	 $series_data =array();

								foreach($organisms as $org){						

									$result= Pathogen::where([
										['Organism',$org],
										['ReportingPeriod',$ReprtingPeriod],
										['Specimentype',$SpecimenType],
										['Facility',$facility]
										])->get();

									$numberOfRows = $result->count();			

										if($numberOfRows=0){
											$specimen_value = 0;	
										}else{

											$specimen_value = $result->pluck('Numberofisolates');		  
											 
										}						
									
									array_push($series_data, $specimen_value);												
								}

								$data[] = array("name"=>$SpecimenType, "data"=>$series_data);
					}							

	 			return response()->json(array('series' => $data, 'categories'=> $organisms));
			 			
	}

	   
	
}





