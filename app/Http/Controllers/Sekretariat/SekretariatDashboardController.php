<?php

namespace App\Http\Controllers\Sekretariat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SekretariatDashboardController extends Controller
{
    public function index() {
        return view('sekretariat.home.index');
    }
}
