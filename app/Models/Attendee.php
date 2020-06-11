<?php

namespace App\Models;

use Exception;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

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

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                $model->entry_token = Str::random(16);
            } catch (Exception $ex) {
                $model->entry_token = Str::random(16);
            }
        });
    }

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

    public function getEntries()
    {
        return $this->load([
            'payments.ticket.events.schedules'
        ])->payments->where('paid', true)->pluck('ticket');
    }
}
