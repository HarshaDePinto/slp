<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'tour', 'name', 'provider', 'f_client', 't_provider', 'commission', 'author',
    ];

    public function duties()
    {
        return $this->belongsToMany('App\Duty');
    }
}
