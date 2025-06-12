<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    function loginpage(){
        return view('auth/login');
    }
    function addUser( Request $data)
    {
        return $data;
    }
    
}
