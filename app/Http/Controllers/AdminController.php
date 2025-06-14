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

    function addUsers(Request $request){
        $employee=new User();
        $employee->name=$request->name;
        $employee->username=$request->username;
        $employee->email=$request->email;
        $employee->password=$request->password;
        $employee->role=$request->role;
        $employee->phone=$request->phone;
        $employee->observer_id=$request->observer_id;
        $employee->station_id=$request->station_id;
        $employee->save();
        if($employee){
            return "Successfully Added";
        }
        else
            return "Error";
    }
}
