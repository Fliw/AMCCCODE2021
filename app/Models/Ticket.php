<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $casts = [
        'buyable' => 'boolean'
    ];

    public function getPriceAttribute($value)
    {
        return 'Rp' . number_format($value, 2, ',', '.');
    }
}
