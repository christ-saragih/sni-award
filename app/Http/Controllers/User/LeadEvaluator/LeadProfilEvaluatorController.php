<?php

namespace App\Http\Controllers\User\LeadEvaluator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilLeadEvaluatorController extends Controller
{
    public function index() {
        return view('lead_evaluator.profil.index');
    }

    public function edit() {
        return view('lead_evaluator.profil.edit');
    }
}
