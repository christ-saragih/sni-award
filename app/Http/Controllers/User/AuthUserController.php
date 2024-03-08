<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\AuthUserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthUserController extends Controller
{
    public function loginUserView() {
        // dd(Auth::check());
        return view('Admin.auth.login');
    }

    public function loginUser(Request $request) {
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
        if (Auth::guard('web')->attempt($infoLogin)) {
            if (Auth::guard('web')->user()->email_verified_at != null) {
                return redirect('/admin/dashboard')->with('success', 'Berhasil masuk');
            }
            else {
                return redirect('/admin/verifikasi');
            }
        }else {
            return redirect('/admin/masuk')->withErrors('Email atau Password salah');
        }
    }

    public function registrasiUserView() {
        return view('Admin.auth.register');
    }

    public function registrasiUser(Request $request) {
        $request->validate([
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8|confirmed',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'email.unique' => 'Email telah terdaftar',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Panjang Password minimal 8 karakter',
            'password.confirmed' => 'Harap konfirmasi password anda',
        ]);
        $dataRegistrasi = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verify_key' => Str::random(100),
            'role' => 1,//data dummy
        ];
        User::create($dataRegistrasi);
        $details = [
            'name' => $dataRegistrasi['name'],
            'datetime' => date('Y-m-d H:i:s'),
            'website' => 'SNI Award',
            'url' => 'http://'.request()->getHttpHost().'/verifikasi'.'/'.$dataRegistrasi['verify_key'],
        ];
        Mail::to($dataRegistrasi['email'])->send(new AuthUserMail($details));
        
        // dd(Auth::check());
        if (Auth::guard('web')->check()) {
            return redirect('/admin/dashboard');
        }else {
            return redirect('/admin/masuk')->with('success', 'Berhasil melakukan registrasi');
        }
    }

    public function verifikasiUserView() {
        $kodeVerifikasi = Auth::guard('web')->user()->verify_key;
        if (Auth::guard('web')->user()->email_verified_at != null) {
            return redirect('/admin/dashboard')->with('Akun telah terverifikasi');
        }else {
            return  view('Admin.auth.verify', ['kode_verifikasi' => $kodeVerifikasi]);
        }
    }

    public function verifikasiUser($verify_key) {
        // dd('zcvzcv');
        $checkKey = User::select('verify_key')->where('verify_key', $verify_key)->exists();
        if ($checkKey) {
            User::where('verify_key', $verify_key)
                ->update(['email_verified_at' => date('Y-m-d H:i:s')]);
            return redirect('/admin/masuk')->with('success', 'Berhasil melakukan verifikasi');
        }else {
            return redirect('/admin/masuk')
                ->withErrors('verify key salah, silahkan coba kembali')
                ->withInput();
        }
    }

    public function verifikasiUlangUser($kode_verifikasi) {
        $details = [
            'name' => Auth::guard('web')->user()->name,
            'datetime' => date('Y-m-d H:i:s'),
            'website' => 'SNI Award',
            'url' => 'http://'.request()->getHttpHost().'/admin/verifikasi'.'/'.$kode_verifikasi,
        ];
        Mail::to(Auth::guard('web')->user()->email)->send(new AuthUserMail($details));
        return redirect('/admin/verifikasi')->with('Email verifikasi ulang telah dikirim');
    }

    public function logoutUser() {
        Auth::guard('web')->logout();
        return redirect('/admin/masuk');
    }
}
