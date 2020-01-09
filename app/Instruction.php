<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    protected $fillable = [
        'tour', 'date', 'name', 'status', 'author',
    ];

    public function duties()
    {
        return $this->belongsToMany('App\Duty');
    }
}
