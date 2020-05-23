<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $casts = [
        'members' => 'array'
    ];

    protected $guarded = ['id'];

    public function setMembersAttribute(array $value)
    {
        $this->attributes['members'] = json_encode($value);
    }
    
    public function category()
    {
        return $this->belongsTo('App\Models\CompetitionCategory');
    }

    public function quests()
    {
        return $this->hasMany('App\Models\Quest');
    }

    public function leader()
    {
        return $this->belongsTo('App\Models\Attendee', 'leader_id');
    }
}
