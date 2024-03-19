<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjadwalanAdminController extends Controller
{
    public function index() {
        return view('admin.penjadwalan.index');
    }
}
