<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InternalAdminController extends Controller
{
    public function index() {
        return view('admin.internal.index');
    }
}
