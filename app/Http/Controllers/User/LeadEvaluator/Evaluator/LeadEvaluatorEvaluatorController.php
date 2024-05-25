<?php

namespace App\Http\Controllers\User\LeadEvaluator\Evaluator;

use App\Http\Controllers\Controller;
use App\Models\Registrasi;
use App\Models\RegistrasiEvaluator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadEvaluatorEvaluatorController extends Controller
{
    public function index(Request $request) {
        $tahun_registrasi = Registrasi::distinct()->pluck('tahun');
        $all_registrasi_id = Registrasi::distinct()->pluck('id');
        
        if ($request->tahun) $all_registrasi_id = Registrasi::where('tahun', $request->tahun)->distinct()->pluck('id');

        $desk_evaluation = RegistrasiEvaluator::where('evaluator_id', Auth::user()->id)
            ->where('stage', 3)
            ->whereIn('registrasi_id', $all_registrasi_id)
            ->get();
        $site_evaluation = RegistrasiEvaluator::where('evaluator_id', Auth::user()->id)
            ->where('stage', 4)
            ->whereIn('registrasi_id', $all_registrasi_id)
            ->get();
        
        return view('lead_evaluator.evaluator.index', [
            'desk_evaluation' => $desk_evaluation,
            'site_evaluation' => $site_evaluation,
            'tahun_registrasi' => $tahun_registrasi,
        ]);
    }
}
