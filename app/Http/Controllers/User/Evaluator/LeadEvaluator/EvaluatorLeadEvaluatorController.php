<?php

namespace App\Http\Controllers\User\Evaluator\LeadEvaluator;

use App\Http\Controllers\Controller;
use App\Models\Registrasi;
use App\Models\RegistrasiEvaluator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluatorLeadEvaluatorController extends Controller
{
    public function index(Request $request) {
        $tahun_registrasi = Registrasi::distinct()->pluck('tahun');

        $desk_evaluation = RegistrasiEvaluator::where('lead_evaluator_id', Auth::user()->id)
            ->where('stage', 3);
        $site_evaluation = RegistrasiEvaluator::where('lead_evaluator_id', Auth::user()->id)
            ->where('stage', 4);
        if ($request->tahun) {
            $desk_evaluation->where('tahun', $request->tahun);
            $site_evaluation->where('tahun', $request->tahun);
        }
        $desk_evaluation->get();
        $site_evaluation->get();
        return view('evaluator.lead_evaluator.index', [
            'tahun_registrasi' => $tahun_registrasi,
            'desk_evaluation' => $desk_evaluation,
            'site_evaluation' => $site_evaluation,
        ]);
    }
}
