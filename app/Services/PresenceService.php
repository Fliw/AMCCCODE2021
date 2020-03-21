<?php

namespace App\Services;

use Illuminate\Database\QueryException;
use App\Models\Presence;

class PresenceService
{
    protected $eventId;

    public function __construct(int $eventId)
    {
        $this->eventId = $eventId;
    }

    public function mark(int $attendeeId)
    {
        try {
            $presence = new Presence;
            $presence->attendee_id = $attendeeId;
            $presence->schedule_id = $this->eventId;
            $presence->save();
        } catch (QueryException $e) {
            return false;
        }

        return true;
    }

    public function cancel(int $attendeeId)
    {
        $presence = Presence::where([
            ['schedule_id', '=', $this->eventId],
            ['attendee_id', '=', $attendeeId]
        ])->delete();

        return $presence->toArray();
    }

    public function setEmpty()
    {
        $presence = Presence::where('schedule_id', $this->eventId)->delete();
        return $presence->toArray();
    }
}