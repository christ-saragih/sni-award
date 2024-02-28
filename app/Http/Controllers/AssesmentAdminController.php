<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssesmentAdminController extends Controller
{
    public function index() {
        return view('admin.assesment.index');
    }
}
