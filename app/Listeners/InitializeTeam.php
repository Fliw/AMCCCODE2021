<?php

namespace App\Listeners;

use App\Events\TeamRegistered;
use App\Models\PaymentMethod;
use App\Models\Ticket;
use App\Services\TeamService;
use RuntimeException;

class InitializeTeam
{
    /**
     * The Team service instance
     *
     * @var \App\Services\TeamService
     */
    protected $teamService;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TeamRegistered  $event
     * @return void
     */
    public function handle(TeamRegistered $event)
    {
        if (!isset($event->team)) {
            throw new RuntimeException(
                'Event data on [' . get_class($event) . '] cannot be null.'
            );
        }

        $this->teamService->find($event->team['id']);

        // Issue initial payment
        if (getConfig('team.onregistered.issuepayment')) {
            $ticket = Ticket::whereSlug(getConfig('team-ticket-1'))->first();
            throw_if(!$ticket, new RuntimeException('Ticket team-ticket-1 is not found'));
            
            $paymentMethod = PaymentMethod::whereUsable(true)->first();
            throw_if(!$paymentMethod, new RuntimeException('No usable payment method found'));
            
            $this->teamService->issuePayment([
                'ticket_id' => $ticket->id,
                'amount' => filter_var($ticket->price, FILTER_SANITIZE_NUMBER_INT),
                'method_id' => $paymentMethod->id
            ]);
        }

        // Issue initial quest
        if (getConfig('team.onregistered.sendquest')) {
            $this->teamService->issueQuest([
                'title' => getConfig('team-first-quest-title'),
                'description' => getConfig('team-first-quest-content'),
                'status' => getConfig('team-first-quest-status')
            ]);
        }
    }
}
