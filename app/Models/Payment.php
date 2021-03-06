<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $guarded = [];

    protected $casts = [
        'paid' => 'boolean'
    ];

    protected $dates = [
        'due'
    ];

    protected $appends = [
        'status',
        'due_short',
        'updated_short',
        'invoice_id'
    ];

    public function getStatusAttribute()
    {
        if ($this->paid) {
            return ['element' => 'success', 'message' => 'Lunas'];
        } else {
            return ['element' => 'warning', 'message' => 'Menunggu Pembayaran'];
        }
    }

    public function getDueShortAttribute()
    {
        return $this->due->format('d M, H:i');
    }

    public function getUpdatedShortAttribute()
    {
        return $this->updated_at->format('d M, H:i');
    }

    public function getInvoiceIdAttribute()
    {
        return str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }

    public function getAmountAttribute($value)
    {
        return 'Rp' . number_format($value, 0, ',', '.');
    }

    public function attendee()
    {
        return $this->belongsTo('App\Models\Attendee');
    }
    
    public function method()
    {
        return $this->belongsTo('App\Models\PaymentMethod');
    }

    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket');
    }
}
