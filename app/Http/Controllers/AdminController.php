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
//    function getUsers(){
//        $users=User::get();
//       return view('admin.users',['users'=>$users]);
//    }

    function getUsers(Request $request) {
    $query = User::query();

    if ($request->has('search')) {
        $query->where(function($q) use ($request) {
            $q->where('name', 'like', $request->search . '%')
              ->orWhere('email', 'like', $request->search . '%')
              ->orWhere('role','like', $request->search.'%');
        });
    }

    $users = $query->get();

    return view('admin.users', ['users' => $users, 'search' => $request->search]);
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
    function deactivate($id){
        $emp=User::findOrFail($id);
        if (!str_starts_with($emp->email, 'deactivated.')){
        $emp->email='deactivated.'.$emp->email;
        $emp->password='deactivated.'.$emp->password;
        }
        $emp->save();
        return redirect()->back()->with('success', 'User deactivated successfully.');
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

    //Station Table
    function getStation(Request $request){
        $query=Station::query();

        if($request->has('search')){
            $query->where(function($q) use ($request){
                $q->where('id','like',$request->search.'%')
                ->orWhere('station_name','like',$request->search.'%')
                ->orWhere('district','like',$request->search.'%');
            });
        }
        $station=$query->get();
        return view('admin.stationView',['stations'=>$station, 'search' => $request->search]);
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
