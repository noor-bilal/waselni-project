<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;
    protected $table='areas';
    protected $dates=['deleted_at'];
    protected $fillable=[
        'name_ar',
        'name_en'
    ];

}
