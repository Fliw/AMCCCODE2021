<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';

    protected $guarded = [];

    protected $casts = [
        'usable' => 'boolean'
    ];
}
