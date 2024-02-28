<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WilayahAdminController extends Controller
{
    public function index() {
        return view('admin.wilayah.index');
    }
}
