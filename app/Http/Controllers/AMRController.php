<?php

namespace App\Http\Controllers;

use App\Models\AH_OrganismsIsolated;
use App\Models\AH_Resistance;
use App\Models\HH_Resistance;
use App\Models\Pathogen;
use App\Models\SamplesWithGrowth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;

class AMRController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // samplewith growth
        $facility_growth = "Mbale";
        //select the facilities available
        
         $totalIsolates = Pathogen::distinct('Numberofisolates')->sum('Numberofisolates'); 
         $totalFacilities = Pathogen::distinct('Facility')->pluck('Facility')->count(); 
         $facilityNames = Pathogen::distinct('Facility')->pluck('Facility'); 
         $totalTypes =Pathogen::distinct('Specimentype')->pluck('Specimentype')->count(); 
         $specimenNames =Pathogen::distinct('Specimentype')->pluck('Specimentype'); 
         $totalPeriods =Pathogen::distinct('ReportingPeriod')->pluck('ReportingPeriod')->count(); 
         $periods =Pathogen::distinct('ReportingPeriod')->pluck('ReportingPeriod'); 


         \Log::info($totalIsolates); 
           \Log::info($totalFacilities); 
             \Log::info($totalTypes);    
             \Log::info($totalPeriods); 

        $facilities_growth = SamplesWithGrowth::distinct('facility')->pluck('facility');


        $periods_growth =  SamplesWithGrowth::distinct('period')->where('facility',$facility_growth)->pluck('period');

       

        // $organisms =  Pathogen::distinct('Organism')->where('Reporting Period',$facility)->pluck('Organism');    
        
        //select Organism 
        $specimenNamesArray =array();
        $data_growth = array();
        $series_names =array();

        $Specimen_result = SamplesWithGrowth::distinct('specimen')->where('facility',$facility_growth)->pluck('specimen');     
    
                    for ($i=0; $i<count($Specimen_result); $i++) {      
                                            
                     $Specimen_ind = $Specimen_result[$i]; 

                     array_push($series_names, $Specimen_result); 
                  
                     $series_data =array();

                    foreach($periods_growth as $period){                       

                        $result= SamplesWithGrowth::where([
                            ['period',$period],
                            ['facility',$facility_growth],
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

                    $data_growth[] = array("name"=>$Specimen_ind, "data"=>$series_data);
                }       

            // return view('testchart')
          //           ->with('series',json_encode($data_growth,JSON_NUMERIC_CHECK))
          //           ->with('categories',json_encode($organisms,JSON_NUMERIC_CHECK));   


        // end samplewithgrowth


        // isolate chart

    $ReprtingPeriod = 'Jan-Mar 19';
    $facility = 'Arua RRH'; 

    $periods_isolates = Pathogen::distinct('ReportingPeriod')->pluck('ReportingPeriod'); 
    $facilities_isolates = Pathogen::distinct('facility')->pluck('facility');    

    // $organisms_isolates =  Pathogen::distinct('Organism')->where('ReportingPeriod',$ReprtingPeriod)->pluck('Organism');  

    $organisms_isolates =  Pathogen::distinct('Organism')->where([
            ['ReportingPeriod',$ReprtingPeriod],
            ['Facility',$facility]
            ])->pluck('Organism');
    
        //select Organism 
        $specimenNamesArray =array();
        $data_isolates = array();
        $series_names =array();

        $Specimen_result = Pathogen::distinct('Specimentype')->where('ReportingPeriod',$ReprtingPeriod)->pluck('Specimentype');     
    
                    for ($i=0; $i<count($Specimen_result); $i++) {      
                                            
                     $Specimen_ind = $Specimen_result[$i]; 

                     array_push($series_names, $Specimen_result); 
                  
                     $series_data =array();

                    foreach($organisms_isolates as $org){                        

                        $result= Pathogen::where([
                            ['Organism',$org],
                            ['ReportingPeriod',$ReprtingPeriod],
                            ['Specimentype',$Specimen_ind]
                            ])->get();

                        $numberOfRows = $result->count();
                         // echo $numberOfRows;

                            if($numberOfRows=0){
                                $specimen_value = 0;    
                            }else{

                                $specimen_value = $result->pluck('Numberofisolates');                     
                                 
                            }                       
                        
                        array_push($series_data, $specimen_value);
                                                
                    }

                    $data_isolates[] = array("name"=>$Specimen_ind, "data"=>$series_data);
                }       

            // return view('testchart')
          //           ->with('series',json_encode($data_isolates,JSON_NUMERIC_CHECK))
          //           ->with('categories',json_encode($organisms,JSON_NUMERIC_CHECK));   


        // end isolate chart

                // adding all this together
                $All_data_for_amr_surveillance = array( 'facilities_growth' => $facilities_growth, 'series_growth'=> $data_growth, 'categories_growth'=>$periods_growth, 'facility_growth'=>$facility_growth)  + array( 'periods_isolates' => $periods_isolates, 'series_isolates'=> $data_isolates, 'categories_isolates'=>$organisms_isolates, 'facilities_isolates'=>$facilities_isolates,'period'=>$ReprtingPeriod,'facility'=>$facility, 'totalPeriods'=>$totalPeriods, 'totalIsolates'=>$totalIsolates, 'totalTypes'=>$totalTypes, 'totalFacilities'=>$totalFacilities, 'facilityNames'=>$facilityNames, 'specimenNames'=>$specimenNames,'periods'=>$periods);

        return view('amr_surveillance', $All_data_for_amr_surveillance);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function get_it()
    {
        return view('sidebar-profile');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
