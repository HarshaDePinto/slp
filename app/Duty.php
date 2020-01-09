<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{
    protected $fillable = [
        'title', 'start', 'end', 'number', 'type', 'dollar', 'status', 'price', 'advanced', 'agreement_id', 'finance_id', 'client', 'client_email', 'author', 'color', 'user_id', 'vehicle_id',
    ];




    public function agreement()
    {
        return $this->belongsTo('App\Agreement');
    }

    public function finance()
    {
        return $this->belongsTo('App\Finance');
    }

    public function driver()
    {
        return $this->belongs('App\User');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }

    public function expenses()
    {
        return $this->belongsToMany('App\Expense');
    }

    public function instructions()
    {
        return $this->belongsToMany('App\Instruction');
    }

    public function locations()
    {
        return $this->belongsToMany('App\Location');
    }

    public function activities()
    {
        return $this->belongsToMany('App\Activity');
    }

    public function shops()
    {
        return $this->belongsToMany('App\Shop');
    }
}
