<?php

namespace App\Http\Controllers\Web\Admin\Dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\TeamUpdateRequest as UpdateRequest;
use App\Models\Attendee;
use App\Models\CompetitionCategory;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['session'] = Auth::user()->toArray();
        $data['teams'] = Team::with('leader', 'category')->get()->toArray();

        return view('app.admin.pages.team.index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $data['session'] = Auth::user()->toArray();
        $data['team'] = $team->load('category', 'leader');
        $data['categories'] = CompetitionCategory::get(['id', 'name']);

        return view('app.admin.pages.team.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     * 
     * @param  \App\Http\Requests\Web\Admin\TeamUpdateRequest  $request
     * @param  \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Team $team)
    {
        $leader = Attendee::find($team->leader_id)->update([
            'name' => $request->leader_name,
            'identity' => $request->leader_identity,
            'institution' => $request->institution,
            'email' => $request->leader_email,
            'whatsapp' => $request->leader_whatsapp
        ]);

        $team = $team->update([
            'name' => $request->team_name,
            'institution' => $request->institution,
            'category_id' => $request->category_id,
            'members' => $request->member
        ]);

        if ($leader && $team) {
            return redirect()->route('admin.teams.index')->with('status', [
                'element' => 'success',
                'message' => 'Berhasil diperbarui!'
            ]);
        }
        
        return redirect()->route('admin.teams.index')->with('status', [
            'element' => 'danger',
            'message' => 'Gagal diperbarui!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('admin.teams.index')->with('status', [
            'element' => 'success',
            'message' => 'Kategori dihapus!'
        ]);
    }
}
