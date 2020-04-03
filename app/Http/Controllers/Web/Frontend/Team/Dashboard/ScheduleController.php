<?php

namespace App\Http\Controllers\Web\Frontend\Team\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $data['session'] = Auth::user()->load('team');
        $data['schedules'] = Schedule::with('event')->get()->toArray();
        
        return view('app.frontend.pages.team.schedules.index', compact('data'));
    }
}
