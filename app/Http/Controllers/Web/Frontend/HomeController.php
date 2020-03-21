<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function landing()
    {
        // If unlocked, show landing
        return view('app.frontend.pages.landing');

        // Else if locked, show coming soon
    }
}
