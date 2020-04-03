<?php

namespace App\Http\Controllers\Web\Admin\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\AccountCreateRequest as CreateRequest;
use App\Models\Admin;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['session'] = Auth::user()->toArray();
        $data['admins'] = Admin::all();

        return view('app.admin.pages.account.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Web\Admin\AccountCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        
        $admin = new Admin;
        $admin->identity = $data['identity'];
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->password = Hash::make($data['password']);
        $admin->save();

        return redirect()->route('admin.accounts.index')->with('status', [
            'element' => 'success',
            'message' => 'Akun admin baru berhasil ditambahkan!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admin.accounts.index')->with('status', [
            'element' => 'success',
            'message' => 'Akun berhasil dihapus!'
        ]);
    }
}
