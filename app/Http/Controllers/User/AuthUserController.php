<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\AuthUserMail;
use App\Mail\ForgotPasswordUserMail;
use App\Models\Registrasi;
use App\Models\User;
use App\Models\UserProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthUserController extends Controller
{
    public function loginUserView() {
        // dd(Auth::check());
        return view('user.auth.login');
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
            $is_sekretariat = count(
                Registrasi::where('sekretariat_id', Auth::user()->id)
                    ->where('tahun', date('Y'))
                    ->get()
            ) != 0;
            $role = strtolower(Auth::user()->jenis_role->nama);
            $role = $is_sekretariat ? 'sekretariat' : str_replace(' ', '_', $role);

            return redirect()->route("$role.dashboard.view")->with('success', 'Berhasil masuk');

        }else {
            return redirect()
                ->route('user.login.view')
                ->with('error', 'Email atau Password salah. Silahkan coba lagi')
                ->withInput();
        }
    }

    public function registrasiUserView() {
        return view('user.auth.register');
    }

    public function registrasiUser(Request $request) {
        $request->validate([
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8|confirmed|strong_password',
            'g-recaptcha-response' => 'required|captcha',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'email.unique' => 'Email telah terdaftar',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Panjang Password minimal 8 karakter',
            'password.confirmed' => 'Harap konfirmasi password anda',
            'password.strong_password' => 'Password harus mengandung huruf besar, huruf kecil, angka, John karakter spesial',
            'g-recaptcha-response.required' => 'Harap verfikasi bahwa Anda bukan robot',
            'g-recaptcha-response.captcha' => 'Captcha error! silahkan coba kembali',
        ]);
        $dataRegistrasi = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verify_key' => Str::random(100),
            'forgot_password_token' => Str::random(100),
            'role' => 2,//default evaluator
        ];
        $user = User::create($dataRegistrasi);
        if ($user) {
            UserProfil::create(['user_id' => $user->id]);
            $details = [
                'name' => $dataRegistrasi['name'],
                'datetime' => date('Y-m-d H:i:s'),
                'website' => 'SNI Award',
                'url' => route('user.verify', $dataRegistrasi['verify_key']),
            ];
            Mail::to($dataRegistrasi['email'])->send(new AuthUserMail($details));    
        }
        
        if (Auth::guard('web')->check()) {
            $is_sekretariat = count(
                Registrasi::where('sekretariat_id', Auth::user()->id)
                    ->where('tahun', date('Y'))
                    ->get()
            ) != 0;
            $role = strtolower(Auth::user()->jenis_role->nama);
            $role = $is_sekretariat ? 'sekretariat' : str_replace(' ', '_', $role);

            return redirect()->route("$role.dashboard.view")->with('success', 'Berhasil masuk');

        }else {
            return redirect()
                ->route('user.login.view')
                ->with('success', 'Berhasil melakukan registrasi');
        }
    }

    public function verifikasiUserView() {
        $kodeVerifikasi = Auth::guard('web')->user()->verify_key;
        $user = Auth::guard('web')->user();
        $is_sekretariat = count(
            Registrasi::where('sekretariat_id', $user->id)
                ->where('tahun', date('Y'))
                ->get()
            ) != 0;
        $role = strtolower($user->jenis_role->nama);
        $role = $is_sekretariat ? 'sekretariat' : str_replace(' ', '_', $role);
        if ($user->email_verified_at != null) {
            return redirect()->route("$role.dashboard.view")->with('success', 'Akun telah terverifikasi');
        }else {
            return  view('user.auth.verify', ['kode_verifikasi' => $kodeVerifikasi]);
        }
    }

    public function verifikasiUser($verify_key) {
        // dd('zcvzcv');
        $checkKey = User::select('verify_key')->where('verify_key', $verify_key)->exists();
        if ($checkKey) {
            User::where('verify_key', $verify_key)
                ->update(['email_verified_at' => date('Y-m-d H:i:s')]);
            return redirect()
                ->route('user.login.view')
                ->with('success', 'Berhasil melakukan verifikasi');
        }else {
            return redirect()
                ->route('user.login.view')
                ->withErrors('verify key salah, silahkan coba kembali')
                ->withInput();
        }
    }

    public function verifikasiUlangUser($kode_verifikasi) {
        $details = [
            'name' => Auth::guard('web')->user()->name,
            'datetime' => date('Y-m-d H:i:s'),
            'website' => 'SNI Award',
            'url' => route('user.verify', $kode_verifikasi),
        ];
        Mail::to(Auth::guard('web')->user()->email)->send(new AuthUserMail($details));
        return redirect()
            ->route('user.verification.view')
            ->with('success', 'Email verifikasi ulang telah dikirim');
    }

    public function logoutUser() {
        Auth::guard('web')->logout();
        return redirect()->route('user.login.view');
    }

    public function forgotPasswordView() {
        return view('user.auth.passwords.forgot');
    }

    public function forgotPassword(Request $request){
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Harap isi email',
            'email.email' => 'Format email tidak benar',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $details = [
                'name' => $user->name,
                'datetime' => date('Y-m-d H:i:s'),
                'website' => 'SNI Award',
                'url' => 'http://'.request()->getHttpHost().'/user/reset-password'.'/'.$user->forgot_password_token.'?email='.$request->email,
            ];
            Mail::to($request->email)->send(new ForgotPasswordUserMail($details));
            return redirect()
                ->route('user.login.view')
                ->with('success', 'Email untuk atur ulang sandi akan segera dikirim');
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
        $user = User::where('email', $request->email)->first();
        if ($user && $user->forgot_password_token == $forgot_password_token) {
            return view('user.auth.passwords.reset', [
                'email' => $request->email, 
                'token' => $forgot_password_token,
            ]);
        }
        return abort(400);
    }

    public function resetPassword(Request $request, $forgot_password_token) {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ], [
            'password.required' => 'Kata sandi harus diisi',
            'password.min' => 'Minimal 8 karakter',
            'password.confirmed' => 'Ulangi kata sandi tidak sama dengan kata sandi',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user && $user->forgot_password_token == $forgot_password_token) {
            $user->update([
                'password' => Hash::make($request->password),
                'forgot_password_token' => Str::random(100),
            ]);
            return  redirect()
                ->route('user.login.view')
                ->with('success', 'Kata sandi berhasil direset! Silahkan login menggunakan kata sandi baru');
        }
        return back()
            ->withInput()
            ->withErrors('Token tidak valid atau sudah expired');
    }
}
