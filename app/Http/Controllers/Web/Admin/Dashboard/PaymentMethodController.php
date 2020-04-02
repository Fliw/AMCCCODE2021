<?php

namespace App\Http\Controllers\Web\Admin\Dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\PaymentMethodCreateRequest as CreateRequest;
use App\Http\Requests\Web\Admin\PaymentMethodUpdateRequest as UpdateRequest;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['session'] = Auth::user()->toArray();
        $data['methods'] = PaymentMethod::all();

        return view('app.admin.pages.payment.method.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Web\Admin\PaymentMethodCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        
        $method = new PaymentMethod;
        $method->name = $data['name'];
        $method->number = $data['number'];
        $method->holder = $data['holder'];
        $method->usable = $data['usable'];
        $method->save();

        return redirect()->route('admin.paymentmethods.index')->with('status', [
            'element' => 'success',
            'message' => 'Metode pembayaran disimpan!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentMethod $paymentmethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentmethod)
    {
        $data['session'] = Auth::user()->toArray();
        $data['method'] = $paymentmethod;

        return view('app.admin.pages.payment.method.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Web\Admin\PaymentMethodUpdateRequest  $request
     * @param  \App\Models\PaymentMethod $paymentmethod
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, PaymentMethod $paymentmethod)
    {
        $data = $request->validated();
        
        $paymentmethod->name = $data['name'];
        $paymentmethod->number = $data['number'];
        $paymentmethod->holder = $data['holder'];
        $paymentmethod->usable = $data['usable'];
        $paymentmethod->save();

        return redirect()->route('admin.paymentmethods.index')->with('status', [
            'element' => 'success',
            'message' => 'Perubahan disimpan!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethod $paymentmethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $paymentmethod)
    {
        $paymentmethod->delete();

        return redirect()->route('admin.paymentmethods.index')->with('status', [
            'element' => 'success',
            'message' => 'Metode pembayaran dihapus!'
        ]);
    }
}
