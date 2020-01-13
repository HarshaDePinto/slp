<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'tour', 'salary', 'activity', 'shopping', 'other', 'author',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function duties()
    {
        return $this->belongsToMany('App\Duty');
    }
}
