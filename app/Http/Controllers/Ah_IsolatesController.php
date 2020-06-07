<?php

namespace App\Http\Controllers;

use App\Models\AH_OrganismsIsolated;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;





class AH_IsolatesController extends Controller {

public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function getDefaultData(){ 

	$district = "Wakiso";
	//select the facilities available

  	$districts = AH_OrganismsIsolated::distinct('district')->pluck('district'); 

	$organisms =  AH_OrganismsIsolated::distinct('organism')->where('district',$district)->pluck('organism');	
	
		//select Organism 
		$specimenNamesArray =array();
		$data = array();
		$series_names =array();
		                
                     $series_data =array();

                     $number=0;

					foreach($organisms as $org){						

						$result= AH_OrganismsIsolated::where([
							['organism',$org],
							['district',$district]							
							])->get();

						$numberOfRows = $result->count();						

							if($numberOfRows>0){									

								$value = $result->pluck('numberisolates');	
													  
								 $number = $value[0];
							}
						
						array_push($series_data, $number);					
												
					}
					

					\Log::info($series_data);
				
				 return view('ah_isolateschart', array( 'districts' => $districts, 'series'=> $series_data, 'categories'=>$organisms,'district'=>$district));

			}


	public function loadDataPerDistrict(){ 

	$district = request()->district;
	//select the facilities available

  	$districts = AH_OrganismsIsolated::distinct('district')->pluck('district'); 

	$organisms =  AH_OrganismsIsolated::distinct('organism')->where('district',$district)->pluck('organism');	
	
		//select Organism 
		$specimenNamesArray =array();
		$data = array();
		$series_names =array();
		                
                     $series_data =array();

                     $number=0;

					foreach($organisms as $org){						

						$result= AH_OrganismsIsolated::where([
							['organism',$org],
							['district',$district]							
							])->get();

						$numberOfRows = $result->count();						

							if($numberOfRows>0){									

								$value = $result->pluck('numberisolates');	
													  
								 $number = $value[0];
							}
						
						array_push($series_data, $number);					
												
					}		
				
				

				  return response()->json(array('series' => $series_data, 'categories'=> $organisms));

			}




}
