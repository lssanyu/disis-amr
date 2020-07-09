<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pathogen;

class HomeController extends Controller
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
        return view('amr_surveillance');
    }

    public function home()
    {
         $totalIsolates = Pathogen::distinct('Numberofisolates')->sum('Numberofisolates'); 
         $totalFacilities = Pathogen::distinct('Facility')->pluck('Facility')->count(); 
         $facilityNames = Pathogen::distinct('Facility')->pluck('Facility'); 
         $totalTypes =Pathogen::distinct('Specimentype')->pluck('Specimentype')->count(); 
         $specimenNames =Pathogen::distinct('Specimentype')->pluck('Specimentype'); 
         $totalPeriods =Pathogen::distinct('ReportingPeriod')->pluck('ReportingPeriod')->count(); 
         $periods =Pathogen::distinct('ReportingPeriod')->pluck('ReportingPeriod');    
         $allOrganisms =  Pathogen::distinct('Organism')->pluck('Organism');   

         $totalsData = array( 'totalPeriods'=>$totalPeriods, 'totalIsolates'=>$totalIsolates, 'totalTypes'=>$totalTypes, 'totalFacilities'=>$totalFacilities, 'facilityNames'=>$facilityNames, 'specimenNames'=>$specimenNames,'periods'=>$periods,'allOrganisms'=>$allOrganisms);

        return view('layouts.home',$totalsData);
    }    
  



  
}
