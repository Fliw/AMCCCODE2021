<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $dates = [
        'from',
        'to'
    ];

    protected $appends = [
        'status'
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

    public function presences()
    {
        return $this->hasMany('App\Models\Presence');
    }
}
