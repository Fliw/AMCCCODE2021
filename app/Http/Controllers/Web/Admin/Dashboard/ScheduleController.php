<?php

namespace App\Http\Controllers\Web\Admin\Dashboard;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\ScheduleCreateRequest as CreateRequest;
use App\Http\Requests\Web\Admin\ScheduleUpdateRequest as UpdateRequest;
use App\Models\Event;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['session'] = Auth::user()->toArray();
        $data['schedules'] = Schedule::with('event')->get();
        $data['events'] = Event::all();

        return view('app.admin.pages.schedule.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Web\Admin\ScheduleCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        
        $schedule = new Schedule;
        $schedule->event_id = $data['event_id'];
        $schedule->venue = $data['venue'];
        $schedule->capacity = $data['capacity'];
        $schedule->from = Carbon::parse($data['from']);
        $schedule->to = Carbon::parse($data['to']);
        $schedule->save();

        return redirect()->route('admin.schedules.index')->with('status', [
            'element' => 'success',
            'message' => 'Berhasil menambahkan jadwal'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $data['session'] = Auth::user()->toArray();
        $data['events'] = Event::all();
        $data['schedule'] = $schedule->load('event');

        return view('app.admin.pages.schedule.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Web\Admin\ScheduleUpdateRequest  $request
     * @param  \App\Models\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Schedule $schedule)
    {
        $data = $request->validated();
        
        $schedule->venue = $data['venue'];
        $schedule->capacity = $data['capacity'];
        $schedule->from = Carbon::parse($data['from']);
        $schedule->to = Carbon::parse($data['to']);
        $schedule->save();

        return redirect()->route('admin.schedules.index')->with('status', [
            'element' => 'success',
            'message' => 'Berhasil memperbarui jadwal'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.schedules.index')->with('status', [
            'element' => 'success',
            'message' => 'Jadwal berhasil dihapus.'
        ]);
    }
}
