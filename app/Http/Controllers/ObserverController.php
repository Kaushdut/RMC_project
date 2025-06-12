<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
