<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function admindashboard(){
        return view('admin/dashboard');
    }
     function adminprofile(){
        return view('admin/profile');
    }
    

}
