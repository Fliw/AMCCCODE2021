<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $guarded = [];

    public function tickets()
    {
        return $this->belongsToMany('App\Models\Ticket')
                    ->as('access')
                    ->withTimestamps();
    }
}
