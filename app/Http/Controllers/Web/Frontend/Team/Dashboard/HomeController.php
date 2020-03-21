<?php

namespace App\Http\Controllers\Web\Frontend\Team\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Helpdesk;
use App\Models\Newsfeed;
use App\Models\Quest;

class HomeController extends Controller
{
    /**
     * Show team dashboard page
     */
    public function index()
    {
        $data['session'] = Auth::user()->load('team', 'team.category');
        
        $data['helpdesks'] = Helpdesk::all()->sortBy('type');
        
        $data['newsfeed'] = Newsfeed::where([
            ['channel', 'like', '%team%'],
            ['published', 1]
        ])->orderByDesc('created_at')->first();
        
        $data['quests'] = Quest::where([
            ['team_id', $data['session']['team']['id']],
            ['status', 'issued']
        ])->orderByDesc('created_at')->get();
        
        return view('app.frontend.pages.team.dashboard.index', compact('data'));
    }
}