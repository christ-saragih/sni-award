<?php

namespace App\Http\Controllers\User\Evaluator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilEvaluatorController extends Controller
{
    public function index() {
        return view('evaluator.profil.index');
    }

    public function edit() {
        return view('evaluator.profil.edit');
    }
}
