<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $fillable = [
        'number', 'from_client', 'from_activities', 'to_driver', 'to_fuel', 'to_maintains', 'to_other',
    ];
}
