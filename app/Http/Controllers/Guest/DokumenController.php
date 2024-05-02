<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Frontpage;
use Illuminate\Http\Request;

class DokumenController extends Controller
{

    public function index() {
        $frontpage_data = Frontpage::get();
        return view('guest.dokumen.index', [
            'frontpage_data' => $frontpage_data[0],
        ]);
    }
}
