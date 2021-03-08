<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Product;
use App\Models\SizeShade;

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
        $faqs = Faq::all();
        return view('site.faqs', compact('faqs'));
    }

    public function product(Product $product)
    {
        $productSizeShades = $product->sizeshades()->get()->pluck('name','pivot.id');

        return view('site.productSingle', compact('product', 'productSizeShades'));
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
