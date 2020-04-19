<?php

namespace App\Services;

use App\Models\Team;
use App\Services\AttendeeService;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class TeamService
{
    protected $team;

    private function checkForException()
    {
        if (! ($this->team instanceof Team)) {
            throw new RuntimeException('team is null or is not instance of App\Models\Team');
        }
    }

    public function create(array $newLeader, array $newTeam)
    {
        return DB::transaction(function () use ($newLeader, $newTeam) {
            $leader = new AttendeeService;
            $leader = $leader->register($newLeader);

            $team = new Team;
            $team->name = $newTeam['name'];
            $team->institution = $newTeam['institution'];
            $team->category_id = $newTeam['category_id'];
            $team->members = $newTeam['members'];
            $team->leader_id = $leader['id'];
            $team->save();

            return $team->toArray();
        });
    }

    public function find(int $id)
    {
        $this->team = Team::with('leader.payments', 'quests')->findOrFail($id);

        return $this;
    }

    public function issueQuest(array $data)
    {
        $this->checkForException();

        $this->team->quests()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'] ?? 'issued'
        ]);

        return $this;
    }

    public function issuePayment(array $data)
    {
        $this->checkForException();

        $this->team->leader->payments()->create([
            'attendee_id' => $this->team->leader_id,
            'ticket_id' => $data['ticket_id'],
            'method_id' => $data['method_id'],
            'amount' => $data['amount'],
            'due' => now()->addDays(7),
            'paid' => false
        ]);
    }
}