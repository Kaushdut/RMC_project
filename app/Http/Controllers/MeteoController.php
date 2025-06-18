<?php

namespace App\Http\Controllers;
use App\Models\Observation;
use Illuminate\Http\Request;
use App\Models\Station;
class MeteoController extends Controller
{
    //
    function meteodashboard(){
        return view('meteorologist/dashboard');
    }
     function meteoprofile(){
        return view('meteorologist/profile');
    }

     function observation(){
         $obsdata = Observation::with('station')->get();
      
        return view('meteorologist/observation',['datas'=>$obsdata]);
    }

     function observationdownload(){
            $obsdata = Station::with('observations')->get();
      
        return view('meteorologist/observationdownload', compact('obsdata'));

    }

    function filter(Request $request)
    { 
       //$date=$request->input('filter_date');
       // $datas=observation::with('station')
        //->when($date , function($query) use ($date){
          //  $query->wheredate('observation_date', $date);
        //})
        //->get();

        return view('meteorologist/observationdownload',compact('datas'));
    }
     
    



   
}
