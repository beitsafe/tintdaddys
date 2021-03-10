<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $loggedUser = auth()->user();
        $data['client'] = $loggedUser->client;
        $data['orders'] = Order::all();
        $data['paymentMethods'] = $loggedUser->paymentMethods()->filter(function ($i) {
            return $i->type == 'card';
        });

        return view('auth.dashboard.home', $data);
    }

    public function adminDash()
    {
        $data['orders'] = Order::where('dispatched', 0)->orderby('created_at', 'DESC')->get();

        return view('admin.dashboard', $data);
    }

    public function updateProfile(Request $request)
    {
        $client = $request->get('client');

        Client::updateOrCreate(['user_id' => \auth()->id()], [
            'firstName' => @$client['firstName'],
            'lastName' => @$client['lastName'],
            'businessName' => @$client['businessName'],
            'address' => @$client['address'],
            'city' => @$client['city'],
            'suburb' => @$client['suburb'],
            'postcode' => @$client['postcode'],
            'phone' => @$client['phone'],
            'abn' => @$client['abn'],
        ]);

        return redirect()->back();
    }

}
