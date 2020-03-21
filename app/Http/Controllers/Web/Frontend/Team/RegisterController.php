<?php

namespace App\Http\Controllers\Web\Frontend\Team;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\CompetitionCategory;
use App\Services\TeamService;

class RegisterController extends Controller
{
    public function index()
    {
        $data['categories'] = CompetitionCategory::get(['id', 'name']);
        
        return view('app.frontend.pages.team.register', compact('data'));
    }

    public function store(Request $request)
    {
        $newLeader = [
            'name' => $request->ketua['nama'],
            'identity' => $request->ketua['nim'],
            'institution' => $request->tim['institusi'],
            'whatsapp' => $request->ketua['whatsapp'],
            'email' => $request->email,
            'password' => $request->password
        ];

        $newTeam = [
            'name' => $request->tim['nama'],
            'institution' => $request->tim['institusi'],
            'category_id' => $request->tim['kategori'],
            'members' => $request->member ?? [],
        ];

        $team = new TeamService;
        $team = $team->create($newLeader, $newTeam);

        Auth::loginUsingId($team['leader_id']);
        
        return redirect()->route('team.dashboard');
    }
}
