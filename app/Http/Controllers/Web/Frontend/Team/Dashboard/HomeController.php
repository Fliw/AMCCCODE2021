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
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $data['session'] = Auth::user()->load([
            'paymentsUnpaid',
            'paymentsUnpaid.ticket',
            'paymentsUnpaid.method',
            'team.category'
        ])->toArray();
        
        $data['helpdesks'] = Helpdesk::all()->sortBy('type');
        $data['newsfeed'] = Newsfeed::team()->latest()->first();
        $data['quests'] = Quest::open()->whereTeamId(
            $data['session']['team']['id']
        )->latest()->get();
        
        return view('app.frontend.pages.team.dashboard.index', compact('data'));
    }
}
