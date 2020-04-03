<?php

namespace App\Http\Controllers\Web\Admin\Dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\ConfigurationCreateRequest as CreateRequest;
use App\Http\Requests\Web\Admin\ConfigurationUpdateRequest as UpdateRequest;
use App\Models\Configuration;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['session'] = Auth::user()->toArray();
        $data['configs'] = Configuration::all();
        $data['types'] = getSupportedConfigTypes();
        
        return view('app.admin.pages.config.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ConfigurationCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        Configuration::create($request->validated());

        return redirect()->route('admin.configs.index')->with('status', [
            'element' => 'success',
            'message' => 'Konfigurasi disimpan!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Configuration $configuration
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuration $config)
    {
        $data['session'] = Auth::user()->toArray();
        $data['config'] = $config;
        $data['types'] = getSupportedConfigTypes();

        return view('app.admin.pages.config.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ConfigurationUpdateRequest  $request
     * @param  \App\Models\Configuration $config
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Configuration $config)
    {
        $config->update($request->validated());

        return redirect()->route('admin.configs.index')->with('status', [
            'element' => 'success',
            'message' => 'Konfigurasi diperbarui!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Configuration $config
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuration $config)
    {
        if ($config->deletable) {
            $config->delete();
            $message = [
                'element' => 'success',
                'message' => 'Konfigurasi dihapus!'
            ];
        } else {
            $message = [
                'element' => 'danger',
                'message' => 'Konfigurasi diproteksi sistem!'
            ];
        }

        return redirect()->route('admin.configs.index')->with('status', $message);
    }
}
