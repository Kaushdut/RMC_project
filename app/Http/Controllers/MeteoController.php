<?php

namespace App\Http\Controllers;

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
    


   
}
