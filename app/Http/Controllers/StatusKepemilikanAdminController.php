<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusKepemilikanAdminController extends Controller
{
    public function index() {
        return view('admin.status_kepemilikan.index');
    }
}
