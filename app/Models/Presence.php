<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $table = 'presences';

    public function attendee()
    {
        return $this->belongsTo('App\Models\Attendee');
    }

    public function schedule()
    {
        return $this->belongsTo('App\Models\Schedule');
    }
}
