<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Station;
use App\Http\Requests\AddStationRequest;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;

class AdminController extends Controller
{
    //Dashboard
    function admindashboard(){
        return view('admin/dashboard');
    }
    //Profile Page
     function adminprofile(){
        return view('admin/profile');
    }

    //User Table
    function getUsers(){
        $users=User::get();
        return view('admin.users',['users'=>$users]);
    }
    //Add User
    function addUsers(AddUserRequest $request){
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
    }
    //Delete User
    function destroy(Request $request,$id){
        $emp=User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
    //Edit and Update in Database
    function update($id){
        $emp=User::find($id);
        return view('admin.edit',['users'=>$emp]);
    }

    function edit(EditUserRequest $request,$id){
        $employee=User::find($id);
        $employee->name=$request->name;
        $employee->username=$request->username;
        $employee->email=$request->email;
        $employee->password=$request->password;
        $employee->role=strtolower($request->role);
        $employee->phone=$request->phone;
        $employee->observer_id=$request->observer_id;
        $employee->station_id=$request->station_id;
        if($employee->save()){
            return redirect('/users');
        }
        else{
            return "Failed to Update";
        }
    }
    //Search Users
    function searchUsers(Request $request){
        $user=User::when($request->search,function($query)use($request){
            return $query->whereAny([
                'name',
                'email'
            ],'like','%'.$request->search.'%');
        })->get();
    }

    //Station Table
    function getStation(){
        $station=Station::get();
        return view('admin.stationView',['stations'=>$station]);
    }
    //Add Station
    function addStations(AddStationRequest $request){
        $station=new Station();
        $station->id=$request->id;
        $station->station_name=$request->station_name;
        $station->district=$request->district;
        $station->latitude=$request->latitude;
        $station->longitude=$request->longitude;
        if($station->save()){
            return redirect()->back()->with('success',"Station Inserted Successfully");
        }
    }
}
