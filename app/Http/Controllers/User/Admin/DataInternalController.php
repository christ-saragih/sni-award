<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserProfil;
use Illuminate\Http\Request;

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
        return view('admin.internal.editInternal', [
            'internal' => $internal,
            'role' => $role,
            'all_role' => $all_role,
        ]);
    }

    public function edit(Request $request, $id){
        $request->validate([
            'role' => 'required',
        ], [
            'role.required' => 'Role belum ditentukan',
        ]);
        $data = [
            'role' => $request->role,
        ];
        $user = User::find($id);
        $user->update($data);
        return redirect('/admin/internal/'.$id)->with('succcess','Data berhasil diubah');
    }
}
