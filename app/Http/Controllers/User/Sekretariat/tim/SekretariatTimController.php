<?php

namespace App\Http\Controllers\User\Sekretariat\tim;

use App\Http\Controllers\Controller;
use App\Models\Registrasi;
use App\Models\RegistrasiEvaluator;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SekretariatTimController extends Controller
{
    public function index() {
        $registrasi = Registrasi::where('sekretariat_id', Auth::user()->id)
            ->where('tahun', date('Y'))
            ->first();
        $tim = $registrasi->registrasi_evaluator;
        // dd($tim);
        return view('sekretariat.tim.index', [
            'registrasi' => $registrasi,
            'tim' => $tim,
        ]);
    }

    public function tambah() {
        $registrasi = Registrasi::where('sekretariat_id', Auth::user()->id)
            ->where('tahun', date('Y'))
            ->first();

        $all_sekretariat = Registrasi::where('sekretariat_id', '!=', null)
            ->distinct()
            ->pluck('sekretariat_id');
            
        $evaluator = User::where('role', 2)
            ->where('verified_at', '!=', null)
            ->whereNotIn('id', $all_sekretariat)
            ->get();
        $lead_evaluator = User::where('role', 3)
            ->where('verified_at', '!=', null)
            ->whereNotIn('id', $all_sekretariat)
            ->get();
            // dd($evaluator);
        return view('sekretariat.tim.tambah', [
            'registrasi' => $registrasi,
            'evaluator' => $evaluator,
            'lead_evaluator' =>$lead_evaluator,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'stage' => 'required', //name from stage
            'tanggal' => 'required',
            'evaluator_id' => 'required',
            'lead_evaluator_id' => 'required',
        ], [
            'stage.required' => 'Stage belum ditentukan',
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'evaluator_id.required' => 'Id evaluator tidak boleh kosong',
            'lead_evaluator_id' => 'Id lead evaluator tidak boleh kosong',
        ]);
        $stage_id = Stage::where('nama', $request->stage)->first()->id;
        $registrasi = Registrasi::where('sekretariat_id', Auth::user()->id)
            ->where('tahun', date('Y'))
            ->first();
        if ($registrasi) {
            RegistrasiEvaluator::create([
                'registrasi_id' => $registrasi->id,
                'stage' => $stage_id,
                'tanggal' => $request->tanggal,
                'evaluator_id' => $request->evaluator_id,
                'lead_evaluator_id' => $request->lead_evaluator_id,
            ]);
            return redirect()->route('sekretariat.tim.view')->with('success', "Berhasil membuat tim $request->stage");
        }
        return redirect()->route('sekretariat.tim.view')->withErrors("Gagal membuat tim $request->stage");

    }
    
}
