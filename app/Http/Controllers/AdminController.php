<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Dash()
    {
        return view('admin.home');
    }

    public function adminDash()
    {
        return view('admin.dashboard');
    }

}
