<?php

namespace App\Http\Controllers;

use App\Models\HH_Resistance;
use App\Models\AH_Resistance;
use App\Models\Pathogen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;

class ResistancePatternController extends Controller
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

        // Ah resistance
                $organism_ah = "Eco";
            

            $organisms_ah = AH_Resistance::distinct('organism')->pluck('organism'); 

            $antibiotics_ah =  AH_Resistance::distinct('Antibiotic')->where('organism',$organism_ah)->pluck('Antibiotic');    
            $resistanceData =  AH_Resistance::distinct('Antibiotic')->where('organism',$organism_ah)->get();
            

            $dataArray_ah = array();
            $errorArray_ah = array();

            foreach ($resistanceData as $resData) {                 
                array_push($dataArray_ah, $resData->percentage);
                
                array_push($errorArray_ah,[$resData->lowerlimit,$resData->upperlimit]);
            }

            

            \Log::info($dataArray_ah);
        // end ah resistance

        // Hh resistance
            $organism_hh = 'Escherichia Coli';
            $specimen = 'Blood';

            

            $organisms_hh = HH_Resistance::distinct('Organism')->pluck('Organism');
            $antibiotics_hh =  HH_Resistance::distinct('antibiotictested')->where('organism',$organism_hh)->pluck('antibiotictested');

            $specimenData =  HH_Resistance::distinct('Specimentype')->pluck('Specimentype');
            
            $resistanceData = HH_Resistance::distinct('Antibiotic')->where([
            ['Organism','Escherichia coli'],['Specimentype',$specimen]
            ])->get();
            
                $n_hh = Pathogen::where([['Specimentype', $specimen],['Organism', $organism_hh]])->sum('Numberofisolates');

            $dataArray_hh = array();
            $errorArray_hh = array();
            $n = 0;

            foreach ($resistanceData as $resData) {                 
                array_push($dataArray_hh, $resData->percentageresistance);
                
                array_push($errorArray_hh,[$resData->lowerlimit,$resData->upperlimit]);               
            }

            \Log::info($dataArray_hh);
        // end Hh resistance

            $ah_hh_resistances = array( 'organisms_ah' => $organisms_ah, 'series_ah'=> $dataArray_ah, 'categories_ah'=>$antibiotics_ah, 'errorData_ah'=>$errorArray_ah,'organism_ah'=>$organism_ah) +  array( 'organisms_hh' => $organisms_hh, 'series_hh'=> $dataArray_hh, 'categories_hh'=>$antibiotics_hh, 'errorData_hh'=>$errorArray_hh, 'specimenData'=> $specimenData, 'numberOfIsolates'=> $n_hh, 'organism_hh'=>$organism_hh, 'specimen' =>$specimen);

        return view('resistance_pattern', $ah_hh_resistances);
    }

   


}
