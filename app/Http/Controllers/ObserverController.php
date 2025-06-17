<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Observation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ObserverController extends Controller
{
    function observerdashboard(Request $request){
        return view('observer/dashboard');
    }
    function addobserve( Request $request)
    {
       $request->validate([
            'maxtemp'=>'required|min:1|max:2',
            'mintemp'=>'required|min:1|max:2'
            ]);
            return  $request;
    }
     function observerprofile(){
        return view('observer/profile');
    }

    function addObserver(Request $request){
        $weather_record=new Observation();
        $weather_record->observer_id=Auth::user()->observer_id;
        $weather_record->date=Carbon::now();
        $weather_record->station_id=Auth::user()->station_id;
        $weather_record->observation_date=$request->observation_date;
       
        $weather_record->rainfall=$request->rainfall;
        $weather_record->save();
        
        return redirect()->back()->with('success',"Observation Recorded Successfully");
        
    }
   
}
