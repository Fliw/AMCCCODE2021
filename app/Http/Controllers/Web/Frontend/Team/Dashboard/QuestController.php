<?php

namespace App\Http\Controllers\Web\Frontend\Team\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Frontend\QuestUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Quest;

class QuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['session'] = Auth::user()->load('team');
        $data['quests'] = Quest::where([
            ['team_id', $data['session']['team']['id']]
        ])->orderByDesc('created_at')->get();


        return view('app.frontend.pages.team.quests.index', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quest $quest
     * @return \Illuminate\Http\Response
     */
    public function show(Quest $quest)
    {
        $data['session'] = Auth::user()->load('team');
        $data['quest'] = $quest;
        
        if ($quest->team_id != $data['session']['team']['id']) {
            return redirect()->route('team.quests.index');
        }
        
        return view('app.frontend.pages.team.quests.show', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Web\Frontend\QuestUpdateRequest  $request
     * @param  \App\Models\Quest $quest
     * @return \Illuminate\Http\Response
     */
    public function update(QuestUpdateRequest $request, Quest $quest)
    {
        $quest->update($request->validated());

        // TODO: Fire event untuk kirim email

        return redirect()->back()->with('status', [
            'element' => 'success',
            'message' => 'Terima kasih! Respon kamu sedang kami review. 
                          Tunggu hasil selanjutnya dari kami :)'
        ]);
    }
}
