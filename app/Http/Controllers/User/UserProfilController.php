<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfilController extends Controller
{
    public function index() {
        $userId = Auth::guard('web')->user()->id;
        $user = User::find($userId);
        return view('admin.profil.index', ['user' => $user]);
    }

    public function editView() {
        $userId = Auth::guard('web')->user()->id;
        $user = User::find($userId);
        return view('admin.profil.edit', ['user' => $user]);
    }

    public function edit(Request $request) {
        $request->validate([
            'no_hp' => 'min:10',
            'npwp' => 'min:15',
        ], [
            'no_hp.min' => 'Nomor Telfon tidak sesuai',
            'npwp.min' => 'Nomor NPWP tidak sesuai',
        ]);
        $userId = Auth::guard('web')->user()->id;
        $userProfil = UserProfil::where('user_id', $userId)->first();
        // dd($userProfil);
        $userProfil->update([
            'no_hp' => $request->no_hp,
            'npwp' => $request->npwp,
            'no_rekening' => $request->no_rekening,
            'url_cv' => $request->url_cv,
            'url_anti_penyuapan' => $request->url_anti_penyuapan,
        ]);
        return redirect('/admin/profil')->with('success', 'Profil berhasil diperbarui');
    }
}
