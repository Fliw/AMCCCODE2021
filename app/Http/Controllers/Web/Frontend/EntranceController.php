<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attendee;
use App\Models\Presence;
use App\Models\Schedule;

class EntranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param string $token
     * @return \Illuminate\Http\Response
     */
    public function index(string $token)
    {
        $attendee = Attendee::where('entry_token', $token)->firstOrFail();
        $entries = $attendee->getEntries()->sortByDesc('events.schedules.from');
        
        return view('app.frontend.pages.entrances.index', compact('entries', 'token'));
    }

    /**
     * Redirect to the specified schedule venue
     *
     * @param string $token
     * @param App\Models\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function redirect(string $token, Schedule $schedule)
    {
        if (! $schedule->is_accessible) {
            return redirect()
                ->route('entrances.index', ['token' => $token])
                ->with('error', 'Belum masuk waktu acara / sudah lewat.');
        }

        $attendee = Attendee::where('entry_token', $token)->firstOrFail();
        $presence = Presence::updateOrCreate([
            'attendee_id' => $attendee->id,
            'schedule_id' => $schedule->id
        ]);

        if ($attendee && $presence) {
            return redirect($schedule->venue_link);
        }

        return "Gagal presensi. Kamu masih dapat mengakses acaranya disini {$schedule->venue_link} tolong untuk memberitahu Panitia apabila melihat pesan ini agar presensi tetap dihitung.";
    }
}
