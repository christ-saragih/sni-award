<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataInternalController extends Controller
{
    public function index() {
        $internal = User::get();
        return view('admin.internal.index', [
            'internal' =>  $internal,
        ]);
    }
    
    public function detail($id) {
        $internal = User::find($id);
        $role = Role::find($internal->role)->nama;
        return view('admin.internal.detailInternal', [
            'internal' => $internal,
            'role' => $role,
        ]);
    }
    
    public function editView ($id) {
        $internal = User::find($id);
        $role = Role::find($internal->role)->nama;
        $all_role = Role::get();
        if (!$internal->verified_at) {
            return view('admin.internal.editInternal', [
                'internal' => $internal,
                'role' => $role,
                'all_role' => $all_role,
            ]);
        }
        return back()->withErrors('User sudah terverifikasi');
    }

    public function edit(Request $request, $id){
        $request->validate([
            'role' => 'required',
        ], [
            'role.required' => 'Role belum ditentukan',
        ]);
        $data = [
            'role' => $request->role,
            'verified_at' => $request->verified_at,
            'verified_by' => Auth::user()->id,
        ];
        $user = User::find($id);
        if (!$user->verified_at) {
            $user->update($data);
            return redirect('/admin/internal/'.$id)->with('succcess','Data berhasil diubah');
        }
        return  back()->withErrors('User sudah terverifikasi');
    }
}
