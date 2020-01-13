<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'tour', 'name', 'provider', 'bill', 'got', 'commission', 'author',
    ];

    public function duties()
    {
        return $this->belongsToMany('App\Duty');
    }
}
