<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'tour', 's_meter', 'c_meter', 'location', 'author',
    ];

    public function duties()
    {
        return $this->belongsToMany('App\Duty');
    }
}
