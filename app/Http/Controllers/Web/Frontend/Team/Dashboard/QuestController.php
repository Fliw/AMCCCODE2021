<?php

namespace App\Http\Controllers\Web\Frontend\Team\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['session'] = Auth::user()->load('team');
        $data['quest'] = Quest::firstWhere([
            ['id', $id],
            ['team_id', $data['session']['team']['id']]
        ]);
        
        if (empty($data['quest'])) {
            return redirect()->back();
        }
        
        return view('app.frontend.pages.team.quests.show', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quest = Quest::findOrFail($id);
        $quest->response = $request->response;
        $quest->status = 'submitted';
        $quest->save();

        // TODO: Fire event untuk kirim email

        return redirect()->back()->with('status', [
            'element' => 'success',
            'message' => 'Terima kasih! Respon kamu sedang kami review. 
                          Tunggu hasil selanjutnya dari kami :)'
        ]);
    }
}
