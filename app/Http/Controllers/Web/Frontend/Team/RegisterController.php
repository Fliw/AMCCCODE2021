<?php

namespace App\Http\Controllers\Web\Frontend\Team;

use App\Events\TeamRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Frontend\TeamStoreRequest;
use App\Models\CompetitionCategory;
use App\Services\TeamService;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
        $this->middleware('guest:team');
    }

    public function index()
    {
        if (getConfig('team.registration.open') == false) {
            return redirect()->route('team.login')
                ->with('error', 'Mohon maaf, pendaftaran tim sudah ditutup. Kamu masih dapat mengirimkan submisi dengan masuk ke Dashboard Tim.');
        }

        $data['categories'] = CompetitionCategory::get(['id', 'name']);
        
        return view('app.frontend.pages.team.register', compact('data'));
    }

    public function store(TeamStoreRequest $request)
    {
        $data = $request->validated();

        $newLeader = [
            'name' => $data['ketua']['nama'],
            'identity' => $data['ketua']['nim'],
            'institution' => $data['tim']['institusi'],
            'whatsapp' => $data['ketua']['whatsapp'],
            'email' => $data['email'],
            'password' => $data['password']
        ];

        $newTeam = [
            'name' => $data['tim']['nama'],
            'institution' => $data['tim']['institusi'],
            'category_id' => $data['tim']['kategori'],
            'members' => $data['member'] ?? [],
        ];

        $team = new TeamService;
        $team = $team->create($newLeader, $newTeam);

        // Dispatch new team related events
        event(new TeamRegistered($team));

        Auth::loginUsingId($team['leader_id']);
        
        return redirect()->route('team.dashboard');
    }
}
