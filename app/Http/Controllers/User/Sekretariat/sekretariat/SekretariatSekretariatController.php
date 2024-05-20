<?php

namespace App\Http\Controllers\User\Sekretariat\sekretariat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SekretariatSekretariatController extends Controller
{
    public function index() {
        return view('sekretariat.sekretariat.index');
    }
}
