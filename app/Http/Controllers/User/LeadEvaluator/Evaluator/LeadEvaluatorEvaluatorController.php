<?php

namespace App\Http\Controllers\User\LeadEvaluator\Evaluator;

use App\Http\Controllers\Controller;
use App\Models\Registrasi;
use App\Models\RegistrasiEvaluator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadEvaluatorEvaluatorController extends Controller
{
    public function index() {
        $desk_evaluation = RegistrasiEvaluator::where('evaluator_id', Auth::user()->id)
            ->where('stage', 3)
            ->get();
        $site_evaluation = RegistrasiEvaluator::where('evaluator_id', Auth::user()->id)
            ->where('stage', 4)
            ->get();
        return view('lead_evaluator.evaluator.index', [
            'desk_evaluation' => $desk_evaluation,
            'site_evaluation' => $site_evaluation,
        ]);
    }
}
