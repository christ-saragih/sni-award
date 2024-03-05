<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class KotaDropdownAdminController extends Controller
{
    public function index(Request $request) {
        $provinsi = Provinsi::findOrFail($request->idnkjn);
        $kotaFiltered = $provinsi->kota->pluck('kota', 'kota_id');
        return response()->json($kotaFiltered);
    }
}
