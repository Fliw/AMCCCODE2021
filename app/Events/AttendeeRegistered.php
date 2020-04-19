<?php

namespace App\Events;

use App\Models\Attendee;
use App\Models\Payment;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AttendeeRegistered
{
    use Dispatchable, SerializesModels;

    /**
     * Invoice data that will be passed to event listener
     *
     * @var \App\Models\Payment
     */
    public $invoice;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->invoice = Payment::with('attendee', 'method', 'ticket')
            ->where('attendee_id', $order['attendee_id'])->firstOrFail();
    }
}
