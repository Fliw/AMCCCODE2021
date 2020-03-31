<?php

namespace App\Http\Controllers\Web\Admin\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\PaymentUpdateRequest as UpdateRequest;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['session'] = Auth::user()->toArray();
        $data['payments'] = Payment::all()->load('attendee', 'ticket', 'method')->toArray();

        return view('app.admin.pages.payment.index', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Web\Admin\PaymentUpdateRequest  $request
     * @param  \App\Models\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Payment $payment)
    {
        $data = $request->validated();
        $payment->paid = $data['paid'];
        $payment->save();
        $payment->load('attendee');

        $message = 'Pembayaran #? a/n ? berhasil ?';
        $message = Str::replaceArray('?', [
            $payment->id,
            $payment->attendee->name,
            $payment->paid ? 'dikonfirmasi' : 'dibatalkan'
        ], $message);

        return redirect()->route('admin.payments.index')->with('status', [
            'element' => $payment->paid ? 'success' : 'warning',
            'message' => $message
        ]);
    }
}
