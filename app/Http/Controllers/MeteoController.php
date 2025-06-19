<?php

namespace App\Http\Controllers;

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

    public function observation(Request $request)
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

    public function report(Request $request)
    {
        $date = $request->input('filter_date') ?? Carbon::today()->toDateString();

        $stations = Station::all();
        $observations = Observation::whereDate('observation_date', $date)
                            ->get()
                            ->keyBy('station_id');

        return view('meteorologist/observationdownload', compact('stations', 'observations', 'date'));
    }
}
