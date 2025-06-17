<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    //
    protected $table="observation";

    protected $fillable = [
    'observer_id',
    'station_id',
    'date',
    'observation_date',
    'rainfall',
];
public function station()
{
    return $this->belongsTo(Station::class,'station_id');

}

}
