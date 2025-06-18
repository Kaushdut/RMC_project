<?php

namespace App\Http\Controllers;
use App\Models\Observation;
use Illuminate\Http\Request;
use App\Models\Station;
use Carbon\Carbon;
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

   

    function report(Request $request)
    { 
      $date=$request->input('filter_date') ?? Carbon::today()->toDateString();
      $stations=Station::all();
      $observations=Observation::whereDate('observation_date', $date)->get()->keyBy('station_id');

        return view('meteorologist/observationdownload',compact('stations','observations','date'));
    }
     
    



   
}
