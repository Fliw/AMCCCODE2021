<?php

namespace App\Listeners;

use App\Events\TeamRegistered;
use App\Mail\Invoice;
use App\Models\Payment;
use App\Models\Helpdesk;
use Illuminate\Support\Facades\Mail;
use RuntimeException;

class SendInvoice
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
        $data['ticket'] = $payment->ticket->name;
        $data['invoice']['id'] = $payment->invoice_id;
        $data['invoice']['amount'] = $payment->amount;
        $data['invoice']['due'] = $payment->due->format('d F Y H:i');
        $data['invoice']['helpdesk'] = Helpdesk::confirmation()->firstOrFail();
        $data['method']['name'] = $payment->method->name;
        $data['method']['number'] = $payment->method->number;
        $data['method']['holder'] = $payment->method->holder;
        
        return $data;
    }

    /**
     * Handle send email event
     * 
     * @param mixed
     * @return void
     */
    public function handle($event)
    {
        if ($event instanceof TeamRegistered) {
            if (! getConfig('team.onregistered.issuepayment')) return;

            $event->invoice = Payment::with('attendee', 'ticket', 'method')
                ->where('attendee_id', $event->team['leader_id'])
                ->firstOrFail();
        }

        if (!isset($event->invoice)) {
            throw new RuntimeException(
                'Event: ' . get_class($event) . ' do not have invoice data.'
            );
        }

        if (! ($event->invoice instanceof Payment)) {
            throw new RuntimeException(
                'Property [invoice] from ' . get_class($event) . 
                ' is not an instance of [' . get_class(new Payment) . '].'
            );
        }

        Mail::to($event->invoice->attendee->email)
            ->send(new Invoice($this->buildPayload($event->invoice)));
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\AttendeeRegistered',
            'App\Listeners\SendInvoice@handle'
        );

        $events->listen(
            'App\Events\TeamRegistered',
            'App\Listeners\SendInvoice@handle'
        );
    }
}