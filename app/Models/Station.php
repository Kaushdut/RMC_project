<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $table = 'stations'; // optional if it follows naming convention

    protected $primaryKey = 'id'; // default is 'id', so can omit if using 'id'

    protected $fillable = [
        'id',
        'station_name', 
        'district',
        'latitude',
        'longitude',

    ];

  
   
    public function observations()
    {
        return $this->hasmany(Observation::class,'station_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
