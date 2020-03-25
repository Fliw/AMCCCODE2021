<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Ticket;
use App\Models\PaymentMethod;
use App\Services\AttendeeService;

class TicketController extends Controller
{
    public function index()
    {
        $data['tickets'] = Ticket::available()->with('events')->get()
            ->transform(function ($ticket) {
                $ticket['description'] = Str::words($ticket['description'], 20);
                return $ticket;
            });
        

        return view('app.frontend.pages.tickets.index', compact('data'));
    }

    public function form(Ticket $ticket)
    {
        if (!$ticket->is_available) {
            // TODO: Change this to display a message instead of plain redirect
            return redirect()->back();
        }

        $data['ticket'] = $ticket->load('events')->toArray();
        $data['payment_methods'] = PaymentMethod::whereUsable(true)->get()->toArray();

        return view('app.frontend.pages.tickets.form', compact('data'));
    }

    public function order(Request $request)
    {
        $attendee = new AttendeeService;
        $attendee->register($request->attendee);
        $order = $attendee->buyTicket($request->order);

        return redirect()->route('ticket.done')->with('order-placed', $order);
    }

    public function done(Request $request)
    {
        if (!$request->session()->has('order-placed')) {
            // TODO: Change this to display a message instead of plain redirect
            return redirect()->back();
        }

        $data['order'] = $request->session()->get('order-placed');

        return view('app.frontend.pages.tickets.done', compact('data'));
    }
}
