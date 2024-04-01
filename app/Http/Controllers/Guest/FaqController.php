<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index() {
        $popular_faq = Faq::where('is_popular', true)->get();
        $unpopular_faq = Faq::where('is_popular', false)->get();
        return view('guest.faq.index', [
            'popular_faq' => $popular_faq,
            'unpopular_faq' => $unpopular_faq,
    ]);
    }
}
