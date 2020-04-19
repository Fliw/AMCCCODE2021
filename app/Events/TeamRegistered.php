<?php

namespace App\Events;

use App\Models\Payment;
use App\Models\Team;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TeamRegistered
{
    use Dispatchable, SerializesModels;

    /**
     * Team data that will be passed to event listener
     *
     * @var array
     */
    public $team;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $team)
    {
        $this->team = $team;
    }
}
