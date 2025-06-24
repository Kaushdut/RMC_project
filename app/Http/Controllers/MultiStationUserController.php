<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Observation;
use App\Models\Station;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $observations = Observation::whereDate('observation_date', $date)->get()->keyBy('station_id');
        return view('multistationuser.dashboard', compact('observations','stations','date'));
    }
    function multistationuserprofile()
    {
        return view('multistationuser/profile');
    }

    function addRainfall(Request $request){
      $request->validate([
            'rainfall'=>['required','numeric','min:0','max:999.9','regex:/^\d{1,3}(\.\d)?$/'],
            'station_id' => ['required','exists:stations,id'],
            'observation_date' =>['required','date'],
        ]);
     
      $weather_record=new Observation();
      $weather_record->station_id=$request->station_id;
      $weather_record->observation_date=$request->observation_date;
      $weather_record->rainfall=$request->rainfall;
      $weather_record->observer_id=Auth::user()->observer_id;
      $weather_record->date=Carbon::now();
      $weather_record->save();
      return redirect()->back()->with('success',"Rainfall Added Successfully");
    }

    function updateRainfall(Request $request,$id){
      $request->validate([
        'rainfall'=>['required','numeric','min:0','max:999.9','regex:/^\d{1,3}(\.\d)?$/'],
    ]);
      $observation=Observation::find($id);
      $observation->rainfall=$request->rainfall;
      $observation->save();
      return redirect()->back()->with('success','Rainfall Updated Successfully.');
    }
   public function generateCsv(Request $request)
   {
         $user = auth()->user(); // the logged-in multi-observer
        $date=$request->input('filter_date') ?? Carbon::today()->toDateString();
        
        $stationIds = $user->stations()->pluck('stations.id');
        $stations = Station::whereIn('id',$stationIds)->get();
        $observations = Observation::whereDate('observation_date', $date)->get()->keyBy('station_id');
        
        $filename="observation.csv";
        $headers=[
            'Content-Type ' =>'text/csv; charset=UTF-8' ,
            'Content-Disposition' =>'attachment; filename="'. $filename .'"',


        ];

        $callback = function () use ($stations , $observations ,$date)
        {
              echo "\xEF\xBB\xBF";
              $file = fopen('php://output', 'w');
                fputcsv($file, ['STATION ID', 'DATE', 'STATION NAME', 'LATITUDE', 'LONGITUDE', 'RAINFALL']);

        foreach ($stations as $station) {
            $obs = $observations[$station->id] ?? null;

            fputcsv($file, [
                $station->id,
                '="' . $date . '"',
                $station->station_name,
                $station->latitude,
                $station->longitude,
               $obs ? $obs->rainfall : ''

            ]);
        }

        fclose($file);
    };

    return Response::stream($callback, 200, $headers);

        }
   
}
