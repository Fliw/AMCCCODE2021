<?php

namespace App\Http\Controllers\Web\Frontend\Team\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Newsfeed;

class NewsfeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['session'] = Auth::user()->load('team');
        $data['newsfeeds'] = Newsfeed::team()->latest()->get();

        return view('app.frontend.pages.team.newsfeeds.index', compact('data'));
    }
}
