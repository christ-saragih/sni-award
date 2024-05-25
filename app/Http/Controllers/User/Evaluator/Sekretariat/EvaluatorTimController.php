<?php

namespace App\Http\Controllers\User\Evaluator\Sekretariat;

use App\Http\Controllers\Controller;
use App\Models\Registrasi;
use App\Models\RegistrasiEvaluator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class EvaluatorTimController extends Controller
{
    public function index($registrasi_id) {
        $registrasi_id = Crypt::decryptString($registrasi_id);
        $registrasi = Registrasi::find($registrasi_id);
        if ($registrasi) {
            $is_sekretariat = $registrasi->sekretariat_id == Auth::user()->id;
            $tim = $registrasi->registrasi_evaluator;
            return view('evaluator.tim.index', [
                'registrasi' => $registrasi,
                'tim' => $tim,
                'is_sekretariat' => $is_sekretariat,
            ]);
        }
        return view('guest.404.404');
    }

    public function create($registrasi_id) {
        $undecrypted_id = $registrasi_id;
        $registrasi_id = Crypt::decryptString($registrasi_id);
        $registrasi = Registrasi::find($registrasi_id);
        if ($registrasi) {
            if ($registrasi->sekretariat_id != Auth::user()->id) return redirect()->route('lead_evaluator.tim.view', $undecrypted_id);
            
            $tim = $registrasi->registrasi_evaluator;
            if (!$tim) {
                $evaluator = User::where('role', 2)
                    ->get();
                $lead_evaluator = User::where('role', 3)
                    ->get();
                // nanti validasi get evaluator & lead jika tanggal tidak sama
                return view('evaluator.tim.create', [
                    'registrasi' => $registrasi,
                    'evaluator' => $evaluator,
                    'lead_evaluator' => $lead_evaluator,
                ]);
            }
            return redirect()->route('evaluator.tim.view', $undecrypted_id)->withErrors("tim penilai telah dibentuk");
        }
        return view('guest.404.404');
    }

    public function store(Request $request, $registrasi_id) {
        $request->validate([
            'stage' => 'required', // stage id
            'tanggal' => 'required|date',
            'evaluator_id' => 'required',
            'lead_evaluator_id' => 'required',
        ], [
            'stage.required' => 'Stage belum ditentukan',
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'tanggal.date' => 'Tipe data tidak sesuai',
            'evaluator_id.required' => 'Id evaluator tidak boleh kosong',
            'lead_evaluator_id.required' => 'Id lead evaluator tidak boleh kosong',
        ]);

        $undecrypted_id = $registrasi_id;
        $registrasi_id = Crypt::decryptString($registrasi_id);
        $registrasi = Registrasi::find($registrasi_id);
        if ($registrasi && $registrasi->sekretariat_id == Auth::user()->id) {
            $tim = $registrasi->registrasi_evaluator;
            if (!$tim) {
                RegistrasiEvaluator::create([
                    'registrasi_id' => $registrasi_id,
                    'stage' => $request->stage,
                    'tanggal' => $request->tanggal,
                    'evaluator_id' => $request->evaluator_id,
                    'lead_evaluator_id' => $request->lead_evaluator_id,
                ]);
                return redirect()->route('evaluator.tim.view', $undecrypted_id)->with('success', 'Berhasil membentuk tim');
            }
            return back()->withErrors("tim penilai telah dibentuk");
        }
        return back()->withErrors("tidak dapat menemukan peserta");
    }

    // API for ajax
    public function getEvaluatorAndLead($user_id, $tanggal) {
        $evaluator_in_team = RegistrasiEvaluator::where('tanggal', $tanggal)
            ->get('evaluator_id');
        $lead_evaluator_in_team = RegistrasiEvaluator::where('tanggal', $tanggal)
            ->get('lead_evaluator_id');

        $evaluator = User::where('role', 2)
            ->where('verified_at', '!=', null)
            ->where('id', '!=', $user_id)
            ->whereNotIn('id', $evaluator_in_team)
            ->get();
        $lead_evaluator = User::where('role', 3)
            ->where('verified_at', '!=', null)
            ->where('id', '!=', $user_id)
            ->whereNotIn('id', $lead_evaluator_in_team)
            ->get();

        return response()->json([
            'evaluator' => $evaluator,
            'lead_evaluator' => $lead_evaluator,
        ]);
    }

}
