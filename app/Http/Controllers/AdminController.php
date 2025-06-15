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
        $users=User::get();
        return view('admin.users',['users'=>$users]);
    }

    function addUsers(Request $request){
        $employee=new User();
        $employee->name=$request->name;
        $employee->username=$request->username;
        $employee->email=$request->email;
        $employee->password=$request->password;
        $employee->role=strtolower($request->role);
        $employee->phone=$request->phone;
        $employee->observer_id=$request->observer_id;
        $employee->station_id=$request->station_id;
        $employee->save();
        if($employee){
            return view('admin.sucess');
        }
        else
            return "Error";
    }

    function destroy(Request $request,$id){
        $emp=User::findOrFail($id)->delete();
      
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    function searchUsers(Request $request){
        $user=User::when($request->search,function($query)use($request){
            return $query->whereAny([
                'name',
                'email'
            ],'like','%'.$request->search.'%');
        })->get();
    }
}
