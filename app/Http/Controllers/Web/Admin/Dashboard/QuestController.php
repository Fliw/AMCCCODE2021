<?php

namespace App\Http\Controllers\Web\Admin\Dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\QuestCreateRequest as CreateRequest;
use App\Http\Requests\Web\Admin\QuestUpdateRequest as UpdateRequest;
use App\Models\Quest;
use App\Models\Team;

class QuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['session'] = Auth::user()->toArray();
        $data['quests'] = Quest::all();
        $data['teams'] = Team::all();

        return view('app.admin.pages.quest.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Web\Admin\QuestCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();

        foreach ($data['team_id'] as $id) {
            Team::find($id)->quests()->create($data);
        }

        return redirect()->route('admin.quests.index')->with('status', [
            'element' => 'success',
            'message' => 'Berhasil membuat quest baru!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quest $quest
     * @return \Illuminate\Http\Response
     */
    public function edit(Quest $quest)
    {
        $data['session'] = Auth::user()->toArray();
        $data['quest'] = $quest->load('team');

        return view('app.admin.pages.quest.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Web\Admin\QuestUpdateRequest $request
     * @param  \App\Models\Quest $quest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Quest $quest)
    {
        $quest->update($request->validated());

        return redirect()->route('admin.quests.index')->with('status', [
            'element' => 'success',
            'message' => 'Berhasil memperbarui quest!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quest $quest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quest $quest)
    {
        $quest->delete();

        return redirect()->route('admin.quests.index')->with('status', [
            'element' => 'success',
            'message' => 'Quest dihapus!'
        ]);
    }
}
