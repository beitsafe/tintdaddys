<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function redirectAfterLogin()
    {

        if (Auth::user()->hasRole(User::ROLE_ADMIN)) {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/dashboard');
        }

    }

    public function Dash()
    {
        return view('admin.home');
    }

    public function adminDash()
    {
        return view('admin.dashboard');
    }

}
