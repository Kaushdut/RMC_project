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
    'min_temperature',
    'max_temperature',
    'rainfall',
];

}
