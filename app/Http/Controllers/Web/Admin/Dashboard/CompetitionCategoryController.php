<?php

namespace App\Http\Controllers\Web\Admin\Dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\CompetitionCategoryCreateRequest as CreateRequest;
use App\Http\Requests\Web\Admin\CompetitionCategoryUpdateRequest as UpdateRequest;
use App\Models\CompetitionCategory;

class CompetitionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['session'] = Auth::user()->toArray();
        $data['categories'] = CompetitionCategory::all();

        return view('app.admin.pages.competition.category.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Web\Admin\CompetitionCategoryCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        CompetitionCategory::create($request->validated());

        return redirect()->route('admin.competitioncategories.index')->with('status', [
            'element' => 'success',
            'message' => 'Kategori disimpan!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompetitionCategory $competitioncategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CompetitionCategory $competitioncategory)
    {
        $data['session'] = Auth::user()->toArray();
        $data['category'] = $competitioncategory;

        return view('app.admin.pages.competition.category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Web\Admin\CompetitionCategoryUpdateRequest  $request
     * @param  \App\Models\CompetitionCategory $competitioncategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, CompetitionCategory $competitioncategory)
    {
        $competitioncategory->update($request->validated());
        
        return redirect()->route('admin.competitioncategories.index')->with('status', [
            'element' => 'success',
            'message' => 'Kategori dihapus!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompetitionCategory $competitioncategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompetitionCategory $competitioncategory)
    {
        $competitioncategory->delete();

        return redirect()->route('admin.competitioncategories.index')->with('status', [
            'element' => 'success',
            'message' => 'Kategori dihapus!'
        ]);
    }
}
