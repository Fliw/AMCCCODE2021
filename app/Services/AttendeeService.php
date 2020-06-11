<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\Attendee;
use App\Models\Payment;
use App\Models\Team;
use App\Models\Ticket;

class AttendeeService
{
    private $attendee;
    private $team;

    public function register(array $data)
    {
        $attendee = new Attendee;
        $attendee->name = $data['name'];
        $attendee->identity = $data['identity'];
        $attendee->institution = $data['institution'];
        $attendee->email = $data['email'];
        $attendee->whatsapp = $data['whatsapp'];

        if (array_key_exists('password', $data)) {
            $attendee->password = Hash::make($data['password']);
        }

        $attendee->save();

        $this->attendee = $attendee;

        return $attendee->toArray();
    }

    public function buyTicket(array $data)
    {
        $ticket = Ticket::findOrFail($data['ticket_id']);
        $amount = $data['amount'] ?? filter_var($ticket->price, FILTER_SANITIZE_NUMBER_INT);
        
        $payment = new Payment;
        $payment->attendee_id = $this->attendee->id;
        $payment->ticket_id = $data['ticket_id'];
        $payment->method_id = $data['method_id'];
        $payment->amount = $amount ?? 0;
        $payment->due = now()->addDays(7);
        $payment->save();

        return $payment->toArray();
    }
}