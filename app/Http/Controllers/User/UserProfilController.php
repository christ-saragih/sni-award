<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Registrasi;
use App\Models\Role;
use App\Models\User;
use App\Models\UserProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class UserProfilController extends Controller
{
    public function index() {
        
        $user = Auth::user();
        $role = strtolower($user->jenis_role->nama);
        return view('user.profil.index', ['user' => $user, 'role' => $role]);
    } 

    public function editView() {
        $user = Auth::user();
        return view('user.profil.edit', ['user' => $user]);
    }

    public function edit(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'no_hp' => 'min:10',
            'npwp' => 'min:15',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak sesuai',
            'no_hp.min' => 'Nomor Telfon tidak sesuai',
            'npwp.min' => 'Nomor NPWP tidak sesuai',
        ]);
        $userId = Auth::guard('web')->user()->id;
        $userProfil = UserProfil::where('user_id', $userId)->first();
        $user = User::find($userId);
        
        $filename_cv = null;
        $filename_anti_suap = null;

        if ($request->hasFile('url_cv')) {
            if ($userProfil->url_cv) {
                $prev_cv_path = storage_path("app/public$userProfil->url_cv");
                if (File::exists($prev_cv_path)) {
                    File::delete($prev_cv_path);
                }
            }
            $file_cv = $request->url_cv;
            $filename_cv = $file_cv->hashName();
            $new_cv_path = storage_path("app/public/User/profil/cv/$userId");
            $file_cv->move($new_cv_path, $filename_cv);
        }
        if ($request->hasFile('url_anti_penyuapan')) {
            if ($userProfil->url_anti_penyuapan) {
                $prev_anti_suap_path = storage_path("app/public$userProfil->url_anti_penyuapan");
                if (File::exists($prev_anti_suap_path)) {
                    File::delete($prev_anti_suap_path);
                }
            }
            $file_anti_suap = $request->url_anti_penyuapan;
            $filename_anti_suap = $file_anti_suap->hashName();
            $new_anti_suap_path = storage_path("app/public/User/profil/dokumen anti penyuapan/$userId");
            $file_anti_suap->move($new_anti_suap_path, $filename_anti_suap);
        }

        $userProfil->update([
            'no_hp' => $request->no_hp,
            'npwp' => $request->npwp,
            'no_rekening' => $request->no_rekening,
            'url_cv' => $filename_cv ? "/storage/User/profil/cv/$userId/$filename_cv" : $userProfil->url_cv,
            'url_anti_penyuapan' => $filename_anti_suap ? "/storage/User/profil/dokumen anti penyuapan/$userId/$filename_anti_suap" : $userProfil->url_anti_penyuapan,
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()
            ->route('user.profil.view')
            ->with('success', 'Profil berhasil diperbarui');
    }
}
