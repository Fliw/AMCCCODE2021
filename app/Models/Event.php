<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $guarded = [];

    protected $casts = [
        'published' => 'bool'
    ];
    
    protected $appends = [
        'published_info'
    ];

    public function getPublishedInfoAttribute()
    {
        if ($this->published) {
            return ['element' => 'success', 'message' => 'Published'];
        } else {
            return ['element' => 'warning', 'message' => 'Draft'];
        } 
    }

    public function tickets()
    {
        return $this->belongsToMany('App\Models\Ticket')
                    ->as('access')
                    ->withTimestamps();
    }
}
