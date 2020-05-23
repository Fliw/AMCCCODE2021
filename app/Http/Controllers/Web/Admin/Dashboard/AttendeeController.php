<?php

namespace App\Http\Controllers\Web\Admin\Dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\AttendeeUpdateRequest as UpdateRequest;
use App\Models\Attendee;
use App\Models\Ticket;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['session'] = Auth::user()->toArray();
        $data['attendees'] = Attendee::with('payments')->doesntHave('team')->get();

        return view('app.admin.pages.attendee.index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendee $attendee
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendee $attendee)
    {
        $data['session'] = Auth::user()->toArray();
        $data['attendee'] = $attendee->load('payments');
        $data['ticket'] = Ticket::get(['id', 'name']);

        return view('app.admin.pages.attendee.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Web\Admin\AttendeeUpdateRequest  $request
     * @param  \App\Models\Attendee $attendee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Attendee $attendee)
    {
        $attendee->update($request->validated());

        return redirect()->route('admin.attendees.index')->with('status', [
            'element' => 'success',
            'message' => 'Berhasil diperbarui!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendee $attendee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendee $attendee)
    {
        $attendee->delete();

        return redirect()->route('admin.attendees.index')->with('status', [
            'element' => 'success',
            'message' => 'Peserta dihapus!'
        ]);
    }
}
