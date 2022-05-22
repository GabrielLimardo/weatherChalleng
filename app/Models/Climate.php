<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Climate extends Model
{
    protected $table = 'climate';

    protected $primaryKey= 'id';

    protected $fillable = [
        'id',
        'climate',
        'city',
        'temperature',
        'weather_icons',
        'created_at',
        'updated_at'

    ];
}
