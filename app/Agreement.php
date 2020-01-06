<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $fillable = [
        'number', 'passenger_details', 'start', 'start_details', 'end', 'end_details', 'hotel_details', 'plan_details', 'activity_details', 'cost_details', 'payment_method', 'includes_details', 'accommodation_details', 'condition', 'author',
    ];

    protected $dates = [
        'start', 'end',
    ];
}
