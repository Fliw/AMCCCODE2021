<?php

namespace App\Http\Controllers\Web\Admin\Dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\NewsfeedCreateRequest as CreateRequest;
use App\Http\Requests\Web\Admin\NewsfeedUpdateRequest as UpdateRequest;
use App\Models\Newsfeed;

class NewsfeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['session'] = Auth::user()->toArray();
        $data['newsfeeds'] = Newsfeed::latest()->get();

        return view('app.admin.pages.newsfeed.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\NewsfeedCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        Newsfeed::create($request->validated());

        return redirect()->route('admin.newsfeeds.index')->with('status', [
            'element' => 'success',
            'message' => 'Newsfeed baru ditambahkan!' 
        ]);
    }

    /**
     * Show the form for editing the specified newsfeed.
     *
     * @param  \App\Models\Newsfeed  $newsfeed
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsfeed $newsfeed)
    {
        $data['session'] = Auth::user()->toArray();
        $data['newsfeed'] = $newsfeed;

        return view('app.admin.pages.newsfeed.edit', compact('data'));
    }

    /**
     * Update the specified newsfeed
     *
     * @param  \App\Http\Requests\NewsfeedUpdateRequest  $request
     * @param  \App\Models\Newsfeed  $newsfeed
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Newsfeed $newsfeed)
    {
        $newsfeed->update($request->validated());

        return redirect()->route('admin.newsfeeds.index')->with('status', [
            'element' => 'success',
            'message' => 'Berhasil memperbarui newsfeed!' 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsfeed  $newsfeed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsfeed $newsfeed)
    {
        $newsfeed->delete();

        return redirect()->route('admin.newsfeeds.index')->with('status', [
            'element' => 'success',
            'message' => 'Berhasil menghapus newsfeed!' 
        ]);
    }
}
