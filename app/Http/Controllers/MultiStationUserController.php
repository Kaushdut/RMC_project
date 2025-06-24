<?php



namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Observation;
use App\Models\Station;
use Carbon\Carbon;
class MultiStationUserController extends Controller
{
    public function viewObservations( Request $request)
    {
        $user = auth()->user(); // the logged-in multi-observer
      $date=$request->input('filter_date') ?? Carbon::today()->toDateString();
        // Get all station IDs assigned to this user
        $stationIds = $user->stations()->pluck('stations.id');
          $stations = Station::whereIn('id',$stationIds)->get();
        // Get all observations from those stations
      //  $observations = Observation::whereIn('station_id', $stationIds)->get();
           $observations = Observation::whereDate('observation_date', $date)
                            ->get()
                             ->keyBy('station_id');
                           
                            


        return view('multistationuser.dashboard', compact('observations','stations','date'));
    }
    function multistationuserprofile()
    {
        return view('multistationuser/profile');
    }

}
