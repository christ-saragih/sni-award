<?php

namespace App\Http\Controllers\User\Sekretariat\evaluator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SekretariatEvaluatorController extends Controller
{
    public function index() {
        return view('sekretariat.evaluator.index');
    }
}
