<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    // protected function __construct()
    // {
    //     $this->middleware([ 'auth:web', 'verified:web' ]);
    // }
    public function index() {
        if (Auth::check() == false) {
            return redirect()->route('user.login.view');
        } elseif (Auth::user()->email_verified_at != null) {
            $role = strtolower(Auth::user()->jenis_role->nama);
            $role = count(Registrasi::where('sekretariat_id', Auth::user()->id)->get()) != 0 ? 'sekretariat' : $role;
            if ($role == 'admin') {
                return redirect()->route('admin.dashboard.view');
            } elseif ($role == 'sekretariat') {
                return redirect()->route('sekretariat.dashboard.view');
            } elseif ($role == 'evaluator') {
                return redirect()->route('evaluator.dashboard.view');
            } elseif ($role == 'lead evaluator') {
                return redirect()->route('lead_evaluator.dashboard.view');
            }
        } else {
            return redirect()->route('user.verification.view');
        }
    }

    public function redirectDashboard() {
        $is_sekretariat = Registrasi::where('sekretariat_id', Auth::user()->id)->first() != null;
        $role = $is_sekretariat ? 'sekretariat' : strtolower(Auth::user()->jenis_role->nama);
        return redirect('/'.$role.'/dashboard')->with('success', 'Berhasil masuk');
    }
}
