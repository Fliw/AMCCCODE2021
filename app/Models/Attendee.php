<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Attendee extends Authenticatable
{
    protected $table = 'attendees';

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = ['id'];

    protected $appends = [
        'first_name'
    ];

    public function getFirstNameAttribute()
    {
        return explode(' ', $this->name)[0];
    }

    public function payments()
    {
        return $this->hasMany('App\Models\Payment');
    }

    public function paymentsUnpaid()
    {
        return $this->hasMany('App\Models\Payment')->wherePaid(false);
    }

    public function team()
    {
        return $this->hasOne('App\Models\Team', 'leader_id');
    }
}
