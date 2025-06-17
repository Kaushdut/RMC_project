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
    
    function observerprofile(){
        return view('observer/profile');
    }

    function addObserver(Request $request){
        //validation
        $request->validate([
            'rainfall'=>['required','numeric','min:0','max:999.9','regex:/^\d{1,3}(\.\d)?$/']
        ],[
            'rainfall.required'=>'Rainfall value required.',
            'rainfall.numeric'=>'Rainfall must be a valid number.',
            'rainfall.min'=>'Rainfall cannot be less than 0.',
            'rainfall.max'=>'Rainfall seems too high.Please recheck.',
            'rainfall.regex'=>'Value can have at most 1 decimal place only.'
        ]);

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
