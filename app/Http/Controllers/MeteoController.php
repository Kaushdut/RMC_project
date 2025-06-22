<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Observation;
use App\Models\Station;
use Carbon\Carbon;

class MeteoController extends Controller
{
    function meteodashboard()
    {
        return view('meteorologist/dashboard');
    }

    function meteoprofile()
    {
        return view('meteorologist/profile');
    }

    public function observation(Request $request) //for observation display and final report download
    {
        $stationId = $request->input('station_id');
        $rangeType = $request->input('range_type');
        $startDate = $request->input('start_date');

        $query = Observation::with('station');

        // Apply date range only if both values are present
        if ($startDate && $rangeType) {
            $start = Carbon::parse($startDate);
            $end = match ($rangeType) {
                'weekly' => $start->copy()->addDays(6),
                'monthly' => $start->copy()->endOfMonth(),
                default => $start,
            };

            $query->whereBetween('observation_date', [$start, $end]);
        }

        if ($stationId) {
            $query->where('station_id', $stationId);
        }

        $datas = $query->get();

        $allstations = Station::all();

        return view('meteorologist.observation', compact('datas', 'allstations'));
    }

   public function report(Request $request) // for the incomplete table display
    {
        $date = $request->input('filter_date') ?? Carbon::today()->toDateString();

        $stations = Station::all();
        $observations = Observation::whereDate('observation_date', $date)
                            ->get()
                            ->keyBy('station_id');

        return view('meteorologist/observationdownload', compact('stations', 'observations', 'date'));
    } 





public function generateCsv(Request $request) // incomplete csv download
{
    $date = $request->input('filter_date') ?? Carbon::today()->toDateString();

    $stations = Station::all();
    $observations = Observation::whereDate('observation_date', $date)->get()->keyBy('station_id');

    $filename = "observation.csv";

    $headers = [
        'Content-Type' => 'text/csv; charset=UTF-8',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ];

    $callback = function () use ($stations, $observations, $date) {
        // Force UTF-8 BOM for Excel to read UTF-8 correctly
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
    



function uploadCsv(Request $request )// complete csv upload
{

   //echo "Uploaded";
   $request->validate([
    'csv_file' =>'required|file|mimes:csv,txt',
   ]);
   $file =fopen($request->file('csv_file'), 'r');
   $header =fgetcsv($file);
   while(($row = fgetcsv($file)) !== false){
    $stationId= trim($row[0]);
    $date=trim($row[1], '="');
    $rainfall= trim($row[5]);
    if($rainfall === ''){
        continue;
    }
   $exits =Observation::where('station_id', $stationId)
   ->where('observation_date', $date)
   ->exists();
    $today = Carbon::now()->toDateTimeString();
    if(!$exits){
   Observation::updateOrCreate(
    ['station_id' =>$stationId, 'observation_date' =>$date, 'date' =>$today],
    ['rainfall' =>$rainfall]
   );
}
   }
fclose($file);
return back()->with('success', 'CSV uploaded and observations added.');

   
    //return view(meteorologist/observationdownload);


}

public function finalreport(Request $request)
{
    $stationId = $request->input('station_id');
    $rangeType = $request->input('range_type');
    $startDate = $request->input('start_date');

    $query = Observation::with('station');

    if ($startDate && $rangeType) {
        $start = Carbon::parse($startDate);
        $end = match ($rangeType) {
            'weekly' => $start->copy()->addDays(6),
            'monthly' => $start->copy()->endOfMonth(),
            default => $start,
        };

        $query->whereBetween('observation_date', [$start, $end]);
    }

    if ($stationId) {
        $query->where('station_id', $stationId);
    }

    $observations = $query->get();
    $stations = Station::all();

    $filename = "finalreport.csv";

    $headers = [
        'Content-Type' => 'text/csv; charset=UTF-8',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ];

    $callback = function () use ($observations) {
        echo "\xEF\xBB\xBF"; // UTF-8 BOM for Excel

        $file = fopen('php://output', 'w');
        fputcsv($file, ['STATION ID', 'DATE', 'DATE OF OBSERVATION', 'STATION NAME', 'LATITUDE', 'LONGITUDE', 'RAINFALL']);

       foreach ($observations as $obs) {
    fputcsv($file, [
        $obs->station_id,
        '="' . $obs->date . '"',
        '="' . $obs->observation_date . '"',
        $obs->station->station_name ?? '',
        $obs->station->latitude ?? '',
        $obs->station->longitude ?? '',
        $obs->rainfall ?? '',
    ]);
}

        fclose($file);
    };

    return Response::stream($callback, 200, $headers);
}
}
