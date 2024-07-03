<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Models\RegistrasiEvaluator;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $desk_evaluation = RegistrasiEvaluator::where('stage', 3)->count();
        $site_evaluation = RegistrasiEvaluator::where('stage', 4)->count();
        $peserta = Peserta::all()->count();
        return view('admin.home.index', compact('desk_evaluation', 'site_evaluation' ,'peserta'));
    }
}
