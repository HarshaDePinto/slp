<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    protected $fillable = [
        'tour', 'vehicle', 'liters', 'location', 'amount', 'meter', 'author',
    ];

    public function vehicles()
    {
        return $this->belongsToMany('App\Vehicle');
    }
}
