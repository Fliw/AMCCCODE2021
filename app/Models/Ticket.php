<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $casts = [
        'buyable' => 'boolean'
    ];

    protected $appends = [
        'is_available'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPriceAttribute($value)
    {
        return 'Rp' . number_format($value, 0, ',', '.');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    public function getIsAvailableAttribute()
    {
        return ($this->buyable && $this->stock > 0);
    }

    public function scopeAvailable($query)
    {
        return $query->where([
            ['buyable', '=', true],
            ['stock', '>', 0]
        ]);
    }

    public function events()
    {
        return $this->belongsToMany('App\Models\Event')
                    ->as('access')
                    ->withTimestamps();
    }

    public function attendees()
    {
        return $this->belongsToMany('App\Models\Attendee', 'payments')
                    ->as('payments')
                    ->withTimestamps();
    }
}
