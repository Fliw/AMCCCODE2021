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
        $attendee->password = Hash::make($data['password']);
        $attendee->save();

        $this->attendee = $attendee;

        return $attendee->toArray();
    }

    public function buyTicket(array $data)
    {
        $ticket = Ticket::find($data['ticket_id'])->first();
        
        if (!$ticket || !$attendee) {
            return false;
        }

        $payment = new Payment;
        $payment->attendee_id = $this->attendee->id;
        $payment->ticket_id = $data['ticket_id'];
        $payment->method_id = $data['method_id'];
        $payment->amount = $ticket->price ?? 0;
        $payment->due = now()->addDays(7);
        $payment->save();

        return $payment->toArray();
    }
}