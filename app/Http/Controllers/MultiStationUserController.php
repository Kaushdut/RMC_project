<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Station;
use App\Models\Observation;

class MultiStationUserController extends Controller
{
    public function viewObservations()
    {
        $user = User::find(4); // the logged-in multi-observer

        // Get all station IDs assigned to this user
        $stationIds = $user->stations()->pluck('stations.id');

        // Get all observations from those stations
        $observations = Observation::whereIn('station_id', $stationIds)->with('station')->get();

        return view('multistationuser.dashboard', compact('observations'));
}
}
