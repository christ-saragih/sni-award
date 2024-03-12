<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
            return redirect('/admin/masuk');
        } elseif (Auth::user()->email_verified_at != null) {
            return view('Admin.home.index');
        } else {
            return redirect('/admin/verifikasi');
        }
    }
}
