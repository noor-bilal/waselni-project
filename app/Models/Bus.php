<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bus extends Model
{
    use  SoftDeletes;
    protected $table='buses';
    protected $dates=['deleted_at'];
    protected $fillable=[
        'name_ar',
        'name_en',
        'number_of_seats',
        'bus_number',
        'trip_price',
        'point',
    ];

    public function areas(){
//        return $this->belongsToMany('App\Models\Area','bus_areas','bus_id','area_id','id','id');

        return $this->hasMany('App\Models\BusArea','bus_id','id');

    }

    public function bus_areas(){
        return $this->hasMany('App\Models\BusArea','bus_id','id');
    }

    public function areas_main(){
        return $this->hasMany('App\Models\BusArea','bus_id','id')->where('arrival_time','!=',null);
    }


    public function area(){
        return $this->belongsToMany('App\Models\Area','bus_areas','bus_id','area_id','id','id');
    }

}
