<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Frontpage;
use App\Models\PenjadwalanDokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{

    public function index() {
        $frontpage_data = Frontpage::get();
        $penjadwalan_dokumen = PenjadwalanDokumen::all();
        return view('guest.dokumen.index', [
            'frontpage_data' => $frontpage_data[0],
            'penjadwalan_dokumen' => $penjadwalan_dokumen,
        ]);
    }

    public function download($id)
    {
        $item = PenjadwalanDokumen::findOrFail($id);
        $filePath = storage_path('app/public/images/frontpage/dokumen_penjadwalan/' . $item->file_dokumen);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }
    }
}
