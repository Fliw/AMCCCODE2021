<?php

namespace App\Services;

use App\Models\Team;
use App\Services\AttendeeService;

class TeamService
{
    public function create(array $newLeader, array $newTeam)
    {
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
    }
}