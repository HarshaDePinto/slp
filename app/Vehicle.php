<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'name', 'image_id', 'status', 'number', 'color', 'seat', 'owner', 'sMilage', 'cMilage', 'next_service', 'license_exp', 'insurance_exp', 'engine_oil', 'gear_oil_change', 'gear_oil', 'ac', 'tyre_pressure', 'tyre_size', 'tyre_air', 'break_pad', 'break_oil', 'fuel_type', 'engine_number', 'chase_number', 'author',
    ];


    public function image()
    {
        return $this->belongsTo('App\Image');
    }

    protected $dates = [
        'license_exp', 'insurance_exp',
    ];
}
