<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'first_name'
    ];

    public function getFirstNameAttribute()
    {
        return explode(' ', $this->name)[0];
    }
}
