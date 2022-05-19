<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weathercode extends Model
{
    protected $table = 'weathercode';

    protected $primaryKey= 'id';

    protected $fillable = [
        'id',
        'Condition'

    ];
}
