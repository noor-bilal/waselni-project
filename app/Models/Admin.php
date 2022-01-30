<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use  SoftDeletes;

    protected $table='admins';
    protected $dates=['deleted_at'];
    protected $fillable=[
    'name',
    'email',
    'mobile',
    'password',
    'image',
    'type',
    'bus_id',
    ];

    public function bus(){
        return $this->belongsTo('App\Models\Bus','bus_id','id');
    }
}
