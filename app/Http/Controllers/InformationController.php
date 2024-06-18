<?php

namespace App\Http\Controllers;

use App\Models\Frontpage;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index() {
        $frontpage_data = Frontpage::get()[0];
        return view('guest.information.index', ['frontpage_data' => $frontpage_data]);
    }
}
