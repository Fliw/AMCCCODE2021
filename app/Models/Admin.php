<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
