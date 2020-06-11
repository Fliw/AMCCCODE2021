<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $guarded = [];

    protected $dates = [
        'from',
        'to'
    ];

    protected $appends = [
        'status',
        'from_short',
        'to_short',
        'is_accessible'
    ];

    public function getStatusAttribute()
    {
        $now = now();
        $start = $this->from;
        $finish = $this->to;

        if ($now->lessThan($start)) {
            return ['element' => 'primary', 'message' => 'Upcoming'];
        } else if ($now->between($start, $finish)) {
            return ['element' => 'warning', 'message' => 'Ongoing'];
        } else if ($now->greaterThan($finish)) {
            return ['element' => 'secondary', 'message' => 'Done'];
        }
    }

    public function getIsAccessibleAttribute()
    {
        return now()->between($this->from, $this->to);
    }

    public function getFromShortAttribute()
    {
        return $this->from->format('d M, H:i');
    }

    public function getToShortAttribute()
    {
        return $this->to->format('d M, H:i');
    }

    public function setFromAttribute($value)
    {
        $this->attributes['from'] = Carbon::parse($value);
    }

    public function setToAttribute($value)
    {
        $this->attributes['to'] = Carbon::parse($value);
    }

    public function presences()
    {
        return $this->hasMany('App\Models\Presence');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }
}
