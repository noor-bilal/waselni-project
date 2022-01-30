<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $table='appointments';

    protected $fillable = [
        'trip_id',
        'area_id',
        'user_id',
        'user_point',
        'status',
        'offer_type',
    ];

    public function trip(){
        return $this->belongsTo('App\Models\Trip','trip_id','id');
    }

    public function area(){
        return $this->belongsTo('App\Models\Area','area_id','id');
    }

    public function user(){
        return $this->hasMany('App\Models\User','id','user_id');
    }


}
