<?php

namespace App\Http\Controllers\Sekretariat;

use App\Http\Controllers\Controller;
use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SekretariatDashboardController extends Controller
{
    public function index() {
        $user = Auth::user();
        $is_sekretariat = count(Registrasi::where('sekretariat_id', $user->id)->distinct()->pluck('sekretariat_id')) != 0;
        
        return view('sekretariat.home.index');
    }
}
