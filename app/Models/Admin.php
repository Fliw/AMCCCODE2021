<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'first_name',
        'profile_pic',
        'short_date'
    ];

    public function getFirstNameAttribute()
    {
        return explode(' ', $this->name)[0];
    }

    public function getProfilePicAttribute()
    {
        $base = 'http://amikom.ac.id/public/fotomhs/?/?_?_?.jpg';
        $identity = explode('.', $this->identity);
        $gen = ('20' . $identity[0]);

        return Str::replaceArray('?', [
            $gen,
            $identity[0],
            $identity[1],
            $identity[2]
        ], $base);
    }

    public function getShortDateAttribute()
    {
        return $this->created_at->format('d M, H:i');
    }
}
