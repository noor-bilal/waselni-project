<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'number_of_point_to_free',
        'number_of_point_to_offer',
        'offer_percent',
        'about_us',
    ];
}
