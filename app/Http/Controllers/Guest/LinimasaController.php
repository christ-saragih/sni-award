<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Frontpage;
use App\Models\PenjadwalanLinimasa;
use Illuminate\Http\Request;

class LinimasaController extends Controller
{
    public function index() {
        $frontpage_data = Frontpage::get();
        $penjadwalan_linimasa = PenjadwalanLinimasa::first();
        return view('guest.linimasa.index', [
            'frontpage_data' => $frontpage_data[0],
            'penjadwalan_linimasa' => $penjadwalan_linimasa,
        ]);
    }
}
