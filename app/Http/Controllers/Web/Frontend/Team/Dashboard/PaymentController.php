<?php

namespace App\Http\Controllers\Web\Frontend\Team\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PaymentMethod;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['session'] = Auth::user()->loadMissing([
            'payments',
            'payments.ticket',
            'payments.method',
            'team',
            'team.category'
        ])->toArray();

        $data['payment_methods'] = PaymentMethod::whereUsable(true)->get();
        
        return view('app.frontend.pages.team.payments.index', compact('data'));
    }
}
