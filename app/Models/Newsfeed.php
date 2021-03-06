<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsfeed extends Model
{
    protected $table = 'newsfeeds';

    protected $guarded = [];

    protected $casts = [
        'published' => 'boolean'
    ];

    protected $appends = [
        'date_diff'
    ];

    public function getDateDiffAttribute()
    {
        return $this->created_at->locale('id_ID')->diffForHumans();
    }

    public function getChannelAttribute($value)
    {
        return explode(',', $value);
    }

    public function setChannelAttribute($value)
    {
        $this->attributes['channel'] = implode(',', $value);
    }

    public function scopeTeam($query)
    {
        return $query->where([
            ['published', 1],
            ['channel', 'like', '%team%']
        ]);
    }
}
