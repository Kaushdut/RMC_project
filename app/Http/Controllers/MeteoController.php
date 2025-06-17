<?php

namespace App\Http\Controllers;
use App\Models\Observation;
use Illuminate\Http\Request;

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

    



   
}
