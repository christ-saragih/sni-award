<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DataInternalController extends Controller
{
    public function index() {
        $internal = User::get();
        $evaluator = User::where('role', 2)->get();
        $lead = User::where('role', 3)->get();
        // $internal = User::paginate(5);
        // $evaluator = User::where('role', 2)->paginate(2);
        // $lead = User::where('role', 3)->paginate(5);
        return view('admin.internal.index', [
            'internal' =>  $internal,
            'evaluator' => $evaluator,
            'lead' => $lead,
        ]);
    }
    
    public function detail($id) {
        $id = Crypt::decryptString($id);
        $internal = User::find($id);
        if ($internal) {
            $role = $internal->jenis_role->nama;
            $all_role = Role::where('nama', '!=', 'admin')->get();
            return view('admin.internal.detailInternal', [
                'internal' => $internal,
                'role' => $role,
                'all_role' => $all_role,
            ]);
        }
        return redirect('/admin/404');
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
        $id = Crypt::decryptString($id);
        $user = User::find($id);
        $user->update($data);
        return redirect('/admin/internal/'.Crypt::encryptString($id))->with('succcess','Data berhasil diubah');
    }
}
