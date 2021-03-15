<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Installer;

class SiteController extends Controller
{
    public function homepage()
    {
        return view('site.homepage');
    }

    public function about()
    {
        $data['installers'] = Installer::all();

        return view('site.about', $data);
    }

    public function faqs()
    {
        $faqs = Faq::all();
        return view('site.faqs', compact('faqs'));
    }

    public function product(Request $request, Product $product)
    {
        $sizes = $product->sizes()->distinct()->get()->pluck('name', 'id');
        $shades = $product->shades()->distinct()->get()->pluck('name', 'id');

        return view('site.productSingle', compact('product', 'sizes', 'shades'));
    }

    public function products()
    {
        $products = Product::all();

        return view('site.products', compact('products'));
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
