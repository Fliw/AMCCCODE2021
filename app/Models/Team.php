<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $casts = [
        'members' => 'array'
    ];
    
    public function category()
    {
        return $this->belongsTo('App\Models\CompetitionCategory');
    }

    public function quests()
    {
        return $this->hasMany('App\Models\Quest');
    }
}
