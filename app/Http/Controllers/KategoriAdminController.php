<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriAdminController extends Controller
{
    public function index() {
        return view('admin.kategori.index');
    }
}
