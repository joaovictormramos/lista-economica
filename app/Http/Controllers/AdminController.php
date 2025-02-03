<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function management()
    {
	$user = Auth::user();
        return view('admin/management', compact('user'));
    }
}
