<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Mail\AuthPesertaMail;
use App\Mail\ForgotPasswordPesertaMail;
use App\Models\KategoriOrganisasi;
use App\Models\Peserta;
use App\Models\PesertaKontak;
use App\Models\PesertaProfil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthPesertaController extends Controller
{
    public function loginPesertaView() {
        return view('Peserta.auth.login');
    }

    public function loginPeserta(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);
        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::guard('peserta')->attempt($infoLogin)) {
            if (Auth::guard('peserta')->user()->email_verified_at != null) {
                return redirect('/peserta/dashboard')->with('success', 'Berhasil masuk');
            }
            else {
                return redirect('/verifikasi');
            }
        }else {
            return redirect('/masuk')->withErrors('Email atau Password salah')->withInput();
        }
    }

    public function registrasiPesertaView() {
        $kategori_organisasi = DB::table('kategori_organisasi')
            ->join('tipe_kategori', 'kategori_organisasi.tipe_kategori_id', '=', 'tipe_kategori.id')
            ->select('kategori_organisasi.*', 'tipe_kategori.nama as nama_tipe_kategori')
            ->get();
        return view('Peserta.auth.register', ['kategori_organisasi' => $kategori_organisasi]);
    }

    public function registrasiPeserta(Request $request) {
        $request->validate([
            'email' => 'required|unique:peserta|email',
            'password' => 'required|min:8|confirmed|strong_password',
            'kategori_organisasi_id' => 'required',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'email.unique' => 'Email telah terdaftar sebagai peserta',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Panjang Password minimal 8 karakter',
            'password.confirmed' => 'Harap konfirmasi password anda',
            'password.strong_password' => 'Password harus mengandung huruf besar, huruf kecil, angka, John karakter spesial',
            'kategori_organisasi_id.required' => 'Kategori Organisasi wajib dipilih',
        ]);
        $dataRegistrasi = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verify_key' => Str::random(100),
            'forgot_password_token' => Str::random(100),
            'kategori_organisasi_id' => $request->kategori_organisasi_id,
        ];
        $peserta = Peserta::create($dataRegistrasi);
        if ($peserta) {
            PesertaProfil::create(['peserta_id' => $peserta->id]);
            $details = [
                'nama' => $dataRegistrasi['nama'],
                'datetime' => date('Y-m-d H:i:s'),
                // 'website' => 'SNI Award',
                'url' => 'http://'.request()->getHttpHost().'/verifikasi'.'/'.$dataRegistrasi['verify_key'],
            ];
            Mail::to($dataRegistrasi['email'])->send(new AuthPesertaMail($details));
        }

        $login_credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('peserta')->attempt($login_credentials)) {
            return redirect('/peserta/dashboard');
        }else {
            return redirect('/masuk')->with('success', 'Berhasil melakukan registrasi');
        }
    }

    public function verifikasiPesertaView() {
        if (!Auth::guard('peserta')->check()) return redirect('/masuk');
        $kode_verifikasi = Auth::guard('peserta')->user()->verify_key;
        if (Auth::guard('peserta')->user()->email_verified_at != null) {
            return redirect('/peserta/dashboard')->with('Akun telah terverifikasi');
        }else {
            return view('Peserta.auth.verify', ['kode_verifikasi' => $kode_verifikasi]);
        }
    }

    public function verifikasiPeserta($verify_key) {
        $checkKey = Peserta::select('verify_key')->where('verify_key', $verify_key)->exists();
        if ($checkKey) {
            $user = Peserta::where('verify_key', $verify_key)
                ->update(['email_verified_at' => date('Y-m-d H:i:s')]);
            return redirect('/masuk')->with('success', 'Berhasil melakukan verifikasi');
        }else {
            return redirect('/masuk')
                ->withErrors('verify key salah, silahkan coba kembali')
                ->withInput();
        }
    }

    public function verifikasiUlangPeserta($kode_verifikasi) {
        $details = [
            'nama' => Auth::guard('peserta')->user()->nama,
            'datetime' => date('Y-m-d H:i:s'),
            // 'website' => 'SNI Award',
            'url' => 'http://'.request()->getHttpHost().'/verifikasi'.'/'.$kode_verifikasi,
        ];
        Mail::to(Auth::guard('peserta')->user()->email)->send(new AuthPesertaMail($details));
        return redirect('/verifikasi')->with('Email verifikasi ulang telah dikirim');
    }

    public function logoutPeserta() {
        Auth::guard('peserta')->logout();
        return redirect('/');
    }

    public function forgotPasswordView() {
        return view('peserta.auth.passwords.forgot');
    }

    public function forgotPassword(Request $request){
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Harap isi email',
            'email.email' => 'Format email tidak benar',
        ]);
        $user = Peserta::where('email', $request->email)->first();
        if ($user) {
            $details = [
                'name' => $user->name,
                'datetime' => date('Y-m-d H:i:s'),
                'website' => 'SNI Award',
                'url' => 'http://'.request()->getHttpHost().'/reset-password'.'/'.$user->forgot_password_token.'?email='.$request->email,
            ];
            Mail::to($request->email)->send(new ForgotPasswordPesertaMail($details));
            return redirect('/masuk')->with('success', 'Email untuk atur ulang sandi akan segera dikirim');
        } else {
            return back()->withErrors('Email tidak terdaftar');
        }
    }

    public function resetPasswordView(Request $request, $forgot_password_token) {
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Harap isi email',
            'email.email' => 'Format email tidak benar',
        ]);
        $user = Peserta::where('email', $request->email)->first();
        if ($user && $user->forgot_password_token == $forgot_password_token) {
            return view('peserta.auth.passwords.reset', [
                'email' => $request->email,
                'token' => $forgot_password_token,
            ]);
        }
        return abort(403);
    }

    public function resetPassword(Request $request, $forgot_password_token) {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ], [
            'password.required' => 'Kata sandi harus diisi',
            'password.min' => 'Minimal 8 karakter',
            'password.confirmed' => 'Ulangi kata sandi tidak sama dengan kata sandi',
        ]);
        $user = Peserta::where('email', $request->email)->first();
        if ($user && $user->forgot_password_token == $forgot_password_token) {
            $user->update([
                'password' => Hash::make($request->password),
                'forgot_password_token' => Str::random(100),
            ]);
            return  redirect('/masuk')->with('success', 'Kata sandi berhasil direset! Silahkan login menggunakan kata sandi baru');
        }
        return back()
            ->withInput()
            ->withErrors('Token tidak valid atau sudah expired');
    }

    public function ubahkatasandiView(){
        $peserta = Peserta::find(Auth::guard('peserta')->user()->id);
        return view('peserta.profil.index', compact([
            'peserta',
        ]));

    }

    public function ubahkatasandi(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'current_password.required' => 'Kata sandi harus diisi',
            'password.required' => 'Kata sandi harus diisi',
            'password.string' => 'Kata sandi harus berupa karakter abjad atau angka',
            'password.min' => 'Minimal 8 karakter',
            'password.confirmed' => 'Ulangi kata sandi tidak sama dengan kata sandi',
        ]);

        $peserta = Peserta::find(Auth::guard('peserta')->user()->id);
        // dd($peserta);
        // dd(Hash::check($request->current_password, $peserta->password));
        if (!Hash::check($request->current_password, $peserta->password)) {
            return redirect()->back()->with('error', 'Kata sandi lama tidak cocok.');
        }
        // $peserta->password = Hash::make($request->password);
        $peserta->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Kata sandi berhasil diubah.');
    }
}
