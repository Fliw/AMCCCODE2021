<?php

namespace App\Events;

use App\Models\Payment;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InvoicePaid
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
    public function __construct(Payment $payment)
    {
        $this->invoice = $this->invoice = Payment::with('attendee', 'ticket', 'method')
            ->findOrFail($payment->id);
    }
}
