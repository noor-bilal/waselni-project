<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusArea extends Model
{
    protected $table='bus_areas';

    public $timestamps=false;
    protected $fillable=[
      'area_id',
      'bus_id',
      'arrival_time',
      'leave_time',
    ];


}
