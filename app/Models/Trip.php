<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table='trips';
    protected $fillable=[
      'bus_id',
      'trip_date',
      'status',
    ];


    public function bus(){
        return $this->belongsTo('App\Models\Bus','bus_id','id');
    }

}
