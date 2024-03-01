<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index() {
        return view('admin.front_page.edit_front_page');
    }
}
