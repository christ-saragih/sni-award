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
        $evaluator = User::where('role', 2)->get();
        $lead = User::where('role', 3)->get();
        return view('admin.internal.index', [
            'internal' =>  $internal,
            'evaluator' => $evaluator,
            'lead' => $lead,
        ]);
    }
    
    public function detail($id) {
        $internal = User::find($id);
        $role = Role::find($internal->role)->nama;
        $all_role = Role::get();
        return view('admin.internal.detailInternal', [
            'internal' => $internal,
            'role' => $role,
            'all_role' => $all_role,
        ]);
    }
    
    // public function editView ($id) {
    //     $internal = User::find($id);
    //     $role = Role::find($internal->role)->nama;
    //     $all_role = Role::get();
    //     return view('admin.internal.editInternal', [
    //         'internal' => $internal,
    //         'role' => $role,
    //         'all_role' => $all_role,
    //     ]);
    // }

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
        $user->update($data);
        return redirect('/admin/internal/'.$id)->with('succcess','Data berhasil diubah');
    }
}
