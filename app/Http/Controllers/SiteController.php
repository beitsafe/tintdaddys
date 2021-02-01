<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function homepage()
    {
        return view('site.homepage');
    }

    public function about()
    {
        return view('site.about');
    }

    public function faqs()
    {
        return view('site.faqs');
    }

    public function product()
    {
        return view('site.productSingle');
    }

    public function privacy()
    {
        return view('site.privacy');
    }

    public function terms()
    {
        return view('site.terms');
    }

    public function contact()
    {
        return view('site.contact');
    }
}
