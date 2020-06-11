<?php

namespace App\Listeners;

use App\Events\InvoicePaid;
use App\Mail\Ticket;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;
use RuntimeException;

class SendTicket
{
    /**
     * Build the invoice payload
     *
     * @param \App\Models\Payment $payment
     * @return array
     */
    protected function buildPayload(Payment $payment)
    {
        $data['attendee']['email'] = $payment->attendee->email;
        $data['attendee']['name'] = $payment->attendee->name;
        $data['attendee']['identity'] = $payment->attendee->identity;
        $data['attendee']['institution'] = $payment->attendee->institution;
        $data['ticket'] = $payment->ticket->name;
        $data['entrance_url'] = route('entrances.index', [
            'token' => $payment->attendee->entry_token
        ]);
        
        return $data;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\InvoicePaid  $event
     * @return void
     */
    public function handle(InvoicePaid $event)
    {
        if (!isset($event->invoice)) {
            throw new RuntimeException(
                'Event data on [' . get_class($event) . '] cannot be null.'
            );
        }

        if (! ($event->invoice instanceof Payment)) {
            throw new RuntimeException(
                'Property [invoice] from ' . get_class($event) . 
                ' is not an instance of [' . get_class(new Payment) . '].'
            );
        }

        Mail::to($event->invoice->attendee->email)
            ->send(new Ticket($this->buildPayload($event->invoice)));
    }
}
