<?php

namespace App\Http\Controllers\User\Sekretariat\lead_evaluator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SekretariatLeadEvaluatorController extends Controller
{
    public function index() {
        return view('sekretariat.lead_evaluator.index');
    }
}
