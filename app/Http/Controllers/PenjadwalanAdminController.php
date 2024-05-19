<?php

namespace App\Http\Controllers;

use App\Models\PenjadwalanDokumen;
use App\Models\PenjadwalanLinimasa;
use Illuminate\Http\Request;

class PenjadwalanAdminController extends Controller
{
    public function index() {
        $penjadwalan_dokumen = PenjadwalanDokumen::all();
        $penjadwalan_linimasa = PenjadwalanLinimasa::first();
        return view('admin.penjadwalan.index', compact(['penjadwalan_dokumen', 'penjadwalan_linimasa']));
        // return view('admin.penjadwalan.index');
    }
}
