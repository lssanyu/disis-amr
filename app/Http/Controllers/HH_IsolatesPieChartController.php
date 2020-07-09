<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Pathogen;
use Redirect;
use Log;
class HH_IsolatesPieChartController extends Controller {

public function index()
    {   
        //dd(Auth::check());
        return view('piechart');
    }

 public function getPieChartData()
 {
			$ReprtingPeriod = 'Oct-Dec 18';
			$facility = 'Kabale RRH';

			$periods = Pathogen::distinct('ReportingPeriod')->pluck('ReportingPeriod');	
		  	$facilities = Pathogen::distinct('facility')->pluck('facility');				  

			$chartData =  Pathogen::distinct('Organism')->where([
					['ReportingPeriod',$ReprtingPeriod],	
					['Facility', $facility]					
					])->pluck('Organism');				              
                  
                
  					 $series_data =array(); 
  					 $organisms =array(); 
  					 $data = array();  				 
  							  									  									
						foreach($chartData as $item)
						{	

								$result= Pathogen::where([
									['Organism',$item],
									['ReportingPeriod',$ReprtingPeriod],	
									['Facility', $facility]						
									])->get();							

								$numberOfRows = $result->count();					

								if($numberOfRows=0){
									$numberOfIsolates = 0;	
								}else
								{							
									$numberOfIsolates = $result->sum('Numberofisolates');	
									$organism = $chartData->pluck('Organism');	
									$data[]= $item; 									
									$data[]= $numberOfIsolates;	
	  							}
	  							array_push($series_data, $data);	  							
	  							$data = []; 		
	  							  					}


	  					$json_data = json_encode($series_data, JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);		  			

			  				 Log::info($json_data);																						
					

			 return  view('piechart', array( 'periods' => $periods, 'series'=> $json_data, 'categories'=>$chartData, 'facilities'=>$facilities,'facility'=>$facility, 'period'=>$ReprtingPeriod));
							

 }

 public function getAllPieChartData()
 {
			
 	Log::info("I get here");

			$periods = Pathogen::distinct('ReportingPeriod')->pluck('ReportingPeriod');	
		  	$facilities = Pathogen::distinct('facility')->pluck('facility');				  

			$chartData =  Pathogen::distinct('Organism')->pluck('Organism');				              
                  
                
  					 $series_data =array(); 
  					 $organisms =array(); 
  					 $data = array();  				 
  							  									  									
						foreach($chartData as $item)
						{	

								$result= Pathogen::where([
									['Organism',$item]															
									])->get();							

								$numberOfRows = $result->count();					

								if($numberOfRows=0){
									$numberOfIsolates = 0;	
								}else
								{							
									$numberOfIsolates = $result->sum('Numberofisolates');	
									//$organism = $chartData->pluck('Organism');	
									$data[]= $item; 									
									$data[]= $numberOfIsolates;	
	  							}
	  							array_push($series_data, $data);	  							
	  							$data = []; 		
	  					}


	  					$json_data = json_encode($series_data, JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);		  			

			  				 Log::info($json_data);																						
					

			 return  view('piechart', array( 'periods' => $periods, 'series'=> $json_data, 'categories'=>$chartData, 'facilities'=>$facilities));
							

 }

  public function getSpecificPieData()
 {			
			$selectedP =  request()->rPeriod;
			$facility =  request()->facility;			

			 $ReprtingPeriod = str_replace('%20',' ',$selectedP);			

			$periods = Pathogen::distinct('ReportingPeriod')->pluck('ReportingPeriod');	
		  	$facilities = Pathogen::distinct('facility')->pluck('facility');				  

			$chartData =  Pathogen::distinct('Organism')->where([
					['ReportingPeriod',$ReprtingPeriod],	
					['Facility', $facility]					
					])->pluck('Organism');	              
                  
                
  					 $series_data =array(); 
  					 $organisms =array(); 
  					 $data = array();  				 
  							  									  									
						foreach($chartData as $item)
						{	

								$result= Pathogen::where([
									['Organism',$item],
									['ReportingPeriod',$ReprtingPeriod],	
									['Facility', $facility]						
									])->get();							

								$numberOfRows = $result->count();					

								if($numberOfRows=0){
									$numberOfIsolates = 0;	
								}else
								{							
									$numberOfIsolates = $result->sum('Numberofisolates');	
									$organism = $chartData->pluck('Organism');	
									$data[]= $item; 									
									$data[]= $numberOfIsolates;	
	  							}
	  							array_push($series_data, $data);	  							
	  							$data = []; 		
	  							  					}
	  			

			 return response()->json(array('series' => $series_data));
							

 }




}