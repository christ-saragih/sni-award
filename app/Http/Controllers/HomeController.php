<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Models\Faq;
use App\Models\Frontpage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $frontpage_data = Frontpage::get();
        $dokumentasi = Dokumentasi::get();
        $popular_faq = Faq::where('is_popular', true)->get();
        // dd($frontpage_data);
        return view('Guest.home.index', [
            'frontpage_data' => $frontpage_data[0],
            'dokumentasi' => $dokumentasi,
            'popular_faq' => $popular_faq,
        ]);
    }
}
