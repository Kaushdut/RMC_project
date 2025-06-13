<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    function admindashboard(){
        return view('admin/dashboard');
    }
     function adminprofile(){
        return view('admin/profile');
    }
    
    function getUsers(){
        $user=User::get();
        return view('admin.users',['user'=>$user]);
    }
}
