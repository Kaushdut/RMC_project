<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Observation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\ObservationRequest;

class ObserverController extends Controller
{
    function observerdashboard(Request $request){
        return view('observer/dashboard');
    }
    
    function observerprofile(){
        return view('observer/profile');
    }

    function addObserver(ObservationRequest $request){
        //Add Observation
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
