<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    protected $fillable = [
        'tour', 'name', 'status', 'author_c', 'author_u',
    ];

    public function duties()
    {
        return $this->belongsToMany('App\Duty');
    }
}
