<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'tour', 'date', 'vehicle', 'details', 'location', 'provider', 'amount', 'meter', 'author',
    ];

    public function vehicles()
    {
        return $this->belongsToMany('App\Vehicle');
    }
}
