<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $casts = [
        'paid' => 'boolean'
    ];

    protected $dates = [
        'due'
    ];

    public function attendee()
    {
        return $this->belongsTo('App\Models\Attendee');
    }
    
    public function method()
    {
        return $this->belongsTo('App\Models\PaymentMethod');
    }
}
