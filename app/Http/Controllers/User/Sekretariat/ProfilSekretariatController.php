<?php

namespace App\Http\Controllers\User\Sekretariat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilSekretariatController extends Controller
{
    public function index() {
        return view('sekretariat.profil.index');
    }

    public function edit() {
        return view('sekretariat.profil.edit');
    }
}
