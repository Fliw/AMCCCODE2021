<?php

namespace App\Http\Controllers\Web\Admin\Dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\EventCreateRequest;
use App\Http\Requests\Web\Admin\EventUpdateRequest;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['session'] = Auth::user()->toArray();
        $data['events'] = Event::all();

        return view('app.admin.pages.event.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Web\Admin\EventCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventCreateRequest $request)
    {
        $data = $request->validated();

        $event = new Event;
        $event->name = $data['name'];
        $event->description = $data['description'];
        $event->published = true;
        $event->save();

        return redirect()->route('admin.events.index')->with('status', [
            'element' => 'success',
            'message' => 'Event disimpan!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $data['session'] = Auth::user()->toArray();
        $data['event'] = $event;

        return view('app.admin.pages.event.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Web\Admin\EventUpdateRequest  $request
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, Event $event)
    {
        $data = $request->validated();

        $event->name = $data['name'];
        $event->description = $data['description'];
        $event->save();

        return redirect()->route('admin.events.index')->with('status', [
            'element' => 'success',
            'message' => 'Perubahan event disimpan!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('status', [
            'element' => 'success',
            'message' => 'Event dihapus!'
        ]);
    }
}
