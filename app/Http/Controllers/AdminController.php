<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function management()
    {
        return view('admin/management');
    }
}
